<?php

namespace Core;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Router
{
    private $controllerNamespace = '\Controllers\\';
    private $logger;
    private $logPath = __DIR__ . '/../../logs/app.log';
    
    public function __construct()
    {
        $this->logger = new Logger('router_logger');
        $this->logger->pushHandler(new StreamHandler($this->logPath, Logger::DEBUG));
    }
    
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
            $errorMessage = 'Router Error: ' . $e->getMessage();
            $this->logger->error($errorMessage);
            
            header("HTTP/1.1 404 Not Found");
            echo $e->getMessage();
        }
    }
}
