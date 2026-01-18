<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function add($method, $path, $controller, $action) {
        $path = '/' . trim($path, '/');
        $this->routes[$method][$path] = ['controller' => $controller, 'action' => $action];
    }

    public function get($path, $controller, $action) { $this->add('GET', $path, $controller, $action); }
    public function post($path, $controller, $action) { $this->add('POST', $path, $controller, $action); }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];

        // 1) If .htaccess rewrote with ?url=..., prefer that
        if (!empty($_GET['url'])) {
            $uri = '/' . trim($_GET['url'], '/');
        } else {
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            // Normalize separators
            $uri = str_replace('\\', '/', $uri);

            // Remove script base (e.g. /SystemeAuth_MVC or /SystemeAuth_MVC/public)
            $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
            if ($scriptName === '/' || $scriptName === '.') {
                $scriptName = '';
            }

            if ($scriptName !== '' && strpos($uri, $scriptName) === 0) {
                $uri = substr($uri, strlen($scriptName));
            }

            // Strip leading /public segment if present
            if (strpos($uri, '/public/') === 0) {
                $uri = substr($uri, strlen('/public'));
            }


            // Strip project folder name (e.g. /SystemeAuth_MVC) if it appears
            $projectFolder = '/' . basename(dirname(__DIR__));
            if ($projectFolder !== '/' && strpos($uri, $projectFolder . '/') === 0) {
                $uri = substr($uri, strlen($projectFolder));
            }

            $uri = '/' . trim($uri, '/');
        }

        // Try multiple normalized candidates to find a matching route
        $candidates = [];
        $candidates[] = $uri;
        $candidates[] = rtrim($uri, '/');
        $candidates[] = '/' . ltrim($uri, '/');

        // If candidate is an index.php path, also consider root '/'
        foreach ($candidates as $c) {
            if (basename($c) === 'index.php') {
                $candidates[] = '/';
            }
        }

        // If candidate equals the project folder (e.g. '/SystemeAuth_MVC'), add '/'
        if (isset($projectFolder) && in_array($projectFolder, $candidates, true)) {
            $candidates[] = '/';
        }

        $candidates = array_unique($candidates);

        $matchedRoute = null;
        $route = null;
        foreach ($candidates as $candidate) {
            if (isset($this->routes[$method][$candidate])) {
                $matchedRoute = $candidate;
                $route = $this->routes[$method][$candidate];
                break;
            }
        }

        if ($route !== null) {
            $controllerClass = "App\\Controllers\\" . $route['controller'];
            $action = $route['action'];
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if (method_exists($controller, $action)) {
                    $controller->$action();
                } else {
                    die("Erreur: Méthode $action introuvable dans $controllerClass");
                }
            } else {
                die("Erreur: Contrôleur $controllerClass introuvable");
            }
        } else {
            // 404 with helpful debug info
            http_response_code(404);
            $debug = [
                'REQUEST_URI' => $_SERVER['REQUEST_URI'] ?? null,
                'SCRIPT_NAME' => $_SERVER['SCRIPT_NAME'] ?? null,
                'COMPUTED_CANDIDATES' => $candidates,
                'AVAILABLE_ROUTES' => isset($this->routes[$method]) ? array_keys($this->routes[$method]) : [],
            ];
            file_put_contents(__DIR__ . '/../logs/router_debug.log', date('c') . " " . print_r($debug, true) . "\n", FILE_APPEND);
            require_once __DIR__ . '/../app/Views/errors/_404.php';
        }
    }
}