# 🚀 TalentHub — Authentication System (Custom MVC)

TalentHub is a recruitment platform connecting **candidates** and **recruiters**. This repository contains the **technical foundation** of the application: a robust, reusable, and secure **Authentication & Role Management System**, built **from scratch** using a **custom MVC architecture** (no framework).

---

## 📌 Project Overview
- **Developer:** Oussama Ait Youss  
- **School:** YouCode (UM6P)  
- **Context:** Web Development Bootcamp  
- **Objective:** Build a scalable backend foundation **without Laravel/Symfony** to deeply understand **MVC, Routing, and Security fundamentals**.

---

## 🏗️ Architecture — MVC Pattern

This project avoids *spaghetti code* by strictly separating responsibilities using the **Model–View–Controller (MVC)** pattern.

### 📂 Directory Structure
```text
TalentHub/
├── app/
│   ├── Controllers/   # Application logic (Auth, Admin, Candidate, Recruiter)
│   ├── Models/        # Database interaction layer (User, Role, etc.)
│   └── Views/         # HTML templates (Login, Dashboards, Errors)
│
├── core/
│   ├── Router.php     # URL parsing & controller dispatching
│   ├── Database.php   # PDO Singleton (secure DB connection)
│   └── Controller.php # Base controller (shared logic)
│
├── public/
│   ├── assets/        # CSS, JavaScript, Images
│   └── index.php      # Front Controller (single entry point)
│
├── .htaccess          # URL rewriting (clean URLs)
├── config.php         # Database configuration
└── database.sql       # Database schema
```

---

## 🔄 Request Lifecycle (Request Flow)

1. The user sends a request (e.g. `/candidate/dashboard`).  
2. `public/index.php` receives the request (Front Controller).  
3. `Router.php` parses the URL and determines the controller/action.  
4. The controller checks **authentication & authorization** (role, session).  
5. The controller requests data from the model (if needed).  
6. The controller renders the appropriate view.

> 📎 This flow demonstrates a **clear separation of concerns** and strong backend organization.

---

## 🔐 Core Features

### 🔑 Authentication
- **Registration:** Dynamic role assignment (Candidate / Recruiter)
- **Login:** Secure authentication using `password_verify()`
- **Logout:** Secure session destruction

### 🛡️ Security & Role Management

#### Role-Based Access Control (RBAC)
- **Candidate** → Access to `/candidate/*`
- **Recruiter** → Access to `/recruiter/*`
- **Admin** → Access to `/admin/*`

#### Route Protection
- Unauthenticated users → redirected to **Login**
- Unauthorized roles → redirected to **403 / Home**

#### Data Security Measures
- Password hashing with **bcrypt**
- **PDO prepared statements** (SQL injection protection)
- Input validation & sanitization (XSS protection)

---

## 🧰 Technology Stack

| Layer | Technology |
|-----|-----------|
| Backend | PHP 8.x (Native OOP) |
| Database | MySQL / MariaDB |
| Frontend | HTML5, CSS3, Vanilla JavaScript |
| Version Control | Git & GitHub (Git Flow) |
| Server | Apache (mod_rewrite) |
| Tooling | Composer (Autoloading) |

---

## ⚙️ Installation & Setup

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/Oussama-Ait-Youss/Systeme-d-Authentification-MVC.git
cd Systeme-d-Authentification-MVC
```

### 2️⃣ Database Configuration

- Create a MySQL database named **`talenthub`**
- Import the SQL schema:
```bash
mysql -u root -p talenthub < database.sql
```

- Configure your database connection in `config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'talenthub');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### 3️⃣ Server Configuration
- Ensure **Apache** is running
- Enable `mod_rewrite`
- Point your virtual host to the **`public/`** directory

⚠️ **Important:** Do not open `index.php` directly from the file explorer. Use a local server (XAMPP, WAMP, Laragon).

---

## 🎓 Academic Context

This project is developed as part of the **YouCode (UM6P) curriculum** and focuses on **backend architecture, security, and best practices**.

---

## 🧠 Recommendation for Evaluation Day

If the evaluator asks you to **"Explain your architecture"**, focus on:
- **Directory Structure** → shows organization and separation of concerns
- **Request Flow** → proves you understand how MVC works internally

💡 Tip: Open this README during your presentation and walk through these sections step by step.

---

✅ *This repository demonstrates a solid understanding of MVC architecture, authentication security, and clean backend design — without relying on frameworks.*

