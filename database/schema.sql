-- 1. Create Database
CREATE DATABASE IF NOT EXISTS System_Auth;
USE System_Auth;

-- 2. Create Roles Table

CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- 3. Create Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    CONSTRAINT fk_user_role 
        FOREIGN KEY (role_id) 
        REFERENCES roles(id) 
        ON DELETE RESTRICT 
        ON UPDATE CASCADE
);

-- 4. Seed Data: Default Roles
INSERT INTO roles (name) VALUES 
('Admin'),
('Candidate'),
('Recruiter');

-- 5. Seed Data: Optional Default Admin
INSERT INTO users (username, email, password, role_id) VALUES 
('Super Admin', 'admin@talenthub.com', '$2y$10$wWqWd.j.X.y.z.A.B.C.D.E.F.G.H.I.J.K.L.M.N.O.P.Q.R.S.T.U', 1);