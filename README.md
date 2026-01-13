# 🚀 TalentHub - Authentication System (Custom MVC)

TalentHub is a recruitment platform connecting candidates and recruiters. This repository contains the **technical foundation** of the application: a robust, reusable, and secure **Authentication and Role Management System**, built entirely from scratch using a **custom MVC Architecture** (No Framework).

## 📋 Project Context
* **Developer:** Oussama Ait Youss
* **School:** YouCode (UM6P)
* **Context:** Web Development Bootcamp
* **Goal:** Build a scalable backend foundation without using frameworks (Laravel/Symfony) to master the core concepts of MVC, Routing, and Security.

---

## 🏗️ Architecture (MVC)

This project avoids "Spaghetti Code" by strictly separating concerns using the **Model-View-Controller** pattern.

### Directory Structure
```text
TalentHub/
├── app/
│   ├── Controllers/   # Handles logic (Admin, Auth, Candidate...)
│   ├── Models/        # Database interactions (User, Role...)
│   └── Views/         # HTML Templates (Dashboards, Login...)
├── core/
│   ├── Router.php     # Parses URL and loads Controllers
│   ├── Database.php   # Singleton PDO Connection
│   └── Controller.php # Base Controller Class
├── public/
│   ├── assets/        # CSS, JS, Images
│   └── index.php      # Entry Point (Front Controller)
├── .htaccess          # URL Rewriting
├── config.php         # Database Constants
└── database.sql       # SQL Import Script

## Request Flow

    User sends a request (e.g., /candidate/dashboard).

    public/index.php catches the request.

    Router parses the URL and calls the specific Controller.

    Controller checks Middleware (is user logged in? has right role?).

    Controller asks Model for data (if needed).

    Controller renders the View to the user.

## Key Features
## Authentication

    Registration: Dynamic role assignment (Candidate/Recruiter).

    Login: Secure credential verification using password_verify().

    Logout: Secure session destruction.

## Security & Roles

    RBAC (Role-Based Access Control):

        Candidate → Can only access /candidate/*

        Recruiter → Can only access /recruiter/*

        Admin → Can only access /admin/*

    Route Protection: Unauthenticated users are redirected to Login. Unauthorized roles are redirected to 403 or Home.

    Data Security:

        Passwords hashed with bcrypt.

        PDO Prepared Statements (SQL Injection protection).

        Input validation and sanitization (XSS protection).

## Technology Stack

    Backend: PHP 8.x (Native, OOP)

    Database: MySQL / MariaDB

    Frontend: HTML5, CSS3, JavaScript (Vanilla)

    Versioning: Git / GitHub (Git Flow)

    Tools: Composer (Autoloading), Apache (Mod_Rewrite)

## Installation & Setup
1. Clone the repository
Bash

git clone https://github.com/Oussama-Ait-Youss/Systeme-d-Authentification-MVC
cd "Systeme-d-Authentification-MVC"

2. Database Configuration

    Create a MySQL database named talenthub.

    Import the provided SQL script:
    Bash

mysql -u root -p talenthub < database.sql

Configure your database connection in config.php (or app/Config/config.php depending on your structure):
PHP

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'talenthub');
    define('DB_USER', 'root');
    define('DB_PASS', '');

3. Server Configuration

    Ensure Apache is running and mod_rewrite is enabled.

    Point your virtual host (or localhost) to the public/ folder.

    Note: Do not open index.php directly from the file explorer; use a local server (XAMPP/WAMP/Laragon).


This project is part of the educational curriculum at YouCode.

---

## Recommendation for Evaluation Day
Since the evaluation asks you to **"Explain your architecture,"** the **Directory Structure** and **Request Flow** sections in this README are your "cheat sheets." When presenting, you can open this README and walk the evaluator through those exact points to prove you understand the flow.
