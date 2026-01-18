<?php
namespace App\Controllers;

class CandidateController {
    public function dashboard() {
        // Sécurité : Vérifier si connecté et si rôle = 2 (Candidat)
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
        require_once __DIR__ . '/../Views/condidate/dashboard.php';
    }
}