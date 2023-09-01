<?php

namespace Core;

class Router
{
    private $controllerNamespace = '\Controllers\\';
    
    public function route($url)
    {
        try {
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

            if (!class_exists($controllerClass)) {
                throw new \Exception("Controller not found: $controllerClass");
            }

            $controller = new $controllerClass();

            if (!method_exists($controller, $action)) {
                throw new \Exception("Action not found: $action");
            }

            if (!empty($queryArray[3])) {
                $controller->$action($queryArray[3]);
            } else {
                $controller->$action();
            }
        } catch (\Exception $e) {
            // Handle exceptions here
            header("HTTP/1.1 404 Not Found");
            echo $e->getMessage();
        }
    }
}
