<?php

namespace Core\Helpers;

abstract class Route
{
    private static $url;
    public static function start()
    {
        self::$url = $_GET['page'] ?? '/';
        $routes = require_once 'core/routes.php';

        $matches = [];
        foreach ($routes as $strPattern => $value) {
            $reg = '~^' . $strPattern . '$~';
            if (preg_match($reg, self::$url, $matches)) {
                break;
            }
        }


        if (count($matches) == 0) {
            die('Page Not Found');
        }

        list($controller, $method) = $routes[$strPattern];

        if (!file_exists('core/controllers/' . $controller . '.php')) {
            die('Controller Not Found');
        }

        $nameController = 'Core\\Controllers\\' . $controller;
        $objController = new $nameController();

        if (!method_exists($objController, $method)) {
            die('Method Not Found');
        }
        unset($matches[0]);
        $objController->$method(...$matches);
    }
}
