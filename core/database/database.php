<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    // Variable statique pour garder l'instance unique
    private static $instance = null;
    public $connection;

    // Le constructeur est privé pour empêcher de faire "new Database()"
    private function __construct() {
        // On charge la config si ce n'est pas déjà fait
        if (!defined('DB_HOST')) {
            require_once __DIR__ . '/../config.php';
        }

        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $this->connection = new PDO($dsn, DB_USER, DB_PASS);
            
            // Configuration des erreurs : on veut des Exceptions
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Mode de récupération par défaut : Tableau associatif
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "connection successfully...";
            
        } catch (PDOException $e) {
            die("Erreur de connexion BDD : " . $e->getMessage());
        }
    }

    // C'est cette méthode statique qu'on appellera partout
    public static function connect() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}

Database::connect();