<?php




class Router
{
    private $router = [];
    public function addRoute($controller, $action, $route, $method)
    {
        $this->router[$method][$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function get($controller, $action, $route)
    {
        $this->addRoute($controller, $action, $route, 'GET');
    }
    public function post($controller, $action, $route)
    {
        $this->addRoute($controller, $action, $route, 'POST');
    }

    public function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $path = strtok($uri, "?");
        $path = str_replace("/TalentHub_Authentification", "", $path);
        $method = $_SERVER['REQUEST_METHOD'];
        if ($path == "") {
            $path = "/";
        }

        if (array_key_exists($path, $this->router[$method])) {
            $controller = $this->router[$method][$path]['controller'];
            $action = $this->router[$method][$path]['action'];
            $controller = new $controller;
            $controller->$action();
            exit;
        } else {
            require_once __DIR__ . "/../Views/errors/404.php";
        }

    }
}