<?php

namespace Core;

class Router
{
    private $controllerNamespace = '\Controllers\\';
    
    public function route($url)
    {
        $queryArray = [];

        if (!empty($url) && $url !== '/') {
            $queryArray = explode('/', $url);
        }

        $controllerName = 'DefaultController';
        $action = 'index';

        if (!empty($queryArray[1])) {
            $controllerName = ucfirst($queryArray[1]) . 'Controller';
        }

        if (!empty($queryArray[2])) {
            $action = $queryArray[2];
        }

        $controllerClass = $this->controllerNamespace . $controllerName;

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            if (method_exists($controller, $action)) {
                if (!empty($queryArray[3])) {
                    $controller->$action($queryArray[3]);
                } else {
                    $controller->$action();
                }
            } else {
                header("HTTP/1.1 404 Not Found");
                echo "Action not found.";
            }
        } else {
            header("HTTP/1.1 404 Not Found");
            echo "Controller not found.";
        }
    }
}
