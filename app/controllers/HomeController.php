<?php
namespace App\Controllers;

class HomeController {
    public function admin(){
        
        require_once __DIR__ . '/../Views/admin/dashboard.php';

    }
    public function index(){
        require_once __DIR__ . '/../Views/Home/index.php';
    }

    public function login(){
        
        require_once __DIR__ . '/../Views/auth/login.php';

    }
}