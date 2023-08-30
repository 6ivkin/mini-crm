<?php
// Пространство имен для класса
namespace app;

use controllers\auth\AuthController;
use controllers\home\HomeController;
use controllers\pages\PageController;
use controllers\roles\RoleController;
use controllers\users\UserController;

class Router
{
    // Определение маршрутов при помощи регулярных выражений
    private $routes = [
        '/^\/' . APP_BASE_PATH . '\/?$/' => ['controller' => 'home\\HomeController', 'action' => 'index'],
    ];

    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $controller = null;
        $action = null;
        $params = null;

        // Пробегаемся по маршрутам ($routes) пока не найдем нужный
        foreach ($this->routes as $pattern => $route) {
            // Ищу маршрут, который соответствует URI при помощи регулярного выражения
            if (preg_match($pattern, $uri, $matches)) {
                $controller = 'controllers\\' . $route['controller'];
                $action = $route['action'] ?? $matches['action'] ?? 'index';
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                break;
            }
        }
    }
}