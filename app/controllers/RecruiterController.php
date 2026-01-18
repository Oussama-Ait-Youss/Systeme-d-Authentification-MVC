<?php
namespace App\Controllers;

class RecruiterController {
    
    public function dashboard() {
        // 1. SECURITY CHECK
        // Verify user is logged in AND has role_id = 3 (Recruiter)
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
            // If not authorized, redirect to login
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        // 2. Load the View
        // We go up two levels (../) to reach app/Views
        require_once __DIR__ . '/../Views/recruiter/dashboard.php';
    }
}