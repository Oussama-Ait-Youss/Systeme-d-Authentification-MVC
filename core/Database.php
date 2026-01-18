<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    public $connection;

    private function __construct() {
        // Charge la config si nécessaire
        if (!defined('DB_HOST')) {
            require_once __DIR__ . '/config.php';
        }

        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $this->connection = new PDO($dsn, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur Connection BDD : " . $e->getMessage());
        }
    }

    public static function connect() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}