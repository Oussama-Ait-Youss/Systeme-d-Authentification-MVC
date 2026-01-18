<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function login() {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function register() {
        require_once __DIR__ . '/../Views/auth/register.php';
    }

    public function loginPost() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            if ($user['role_id'] == 1) header('Location: ' . BASE_URL . '/admin/dashboard');
            elseif ($user['role_id'] == 2) header('Location: ' . BASE_URL . '/candidate/dashboard');
            else header('Location: ' . BASE_URL . '/recruiter/dashboard');
            exit;
        }

        echo "Email ou mot de passe incorrect.";
    }

    public function registerPost() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        $username = htmlspecialchars($_POST['username'] ?? '');
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';
        $role_id = (int)($_POST['role_id'] ?? 2);

        if (empty($username) || empty($email) || empty($password)) {
            die("Please fill all fields.");
        }

        $userModel = new User();
        if ($userModel->findByEmail($email)) {
            die("Email already exists.");
        }

        if ($userModel->register($username, $email, $password, $role_id)) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        die("Registration failed.");
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
        exit;
    }
}