<?php
namespace App\Controllers;

class AdminController {
    
    public function dashboard() {
        // Security Check: Role ID 1 = Admin
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }
}