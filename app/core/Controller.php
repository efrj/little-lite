<?php

namespace Core;

use Core\View;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Controller
{
    protected $view;
    private $logger;
    private $logPath = __DIR__ . '/../../logs/app.log';

    public function __construct()
    {
        $this->view = new View();
        $this->logger = new Logger('controller_logger');
        $this->logger->pushHandler(new StreamHandler($this->logPath, Logger::DEBUG));
    }
    
    protected function createLogger($channelName)
    {
        $logger = new Logger($channelName);
        $logger->pushHandler(new StreamHandler($this->logPath, Logger::DEBUG));
        return $logger;
    }

    protected function handleException(\Exception $e)
    {
        $errorMessage = 'Controller Error: ' . $e->getMessage();
        $this->logger->error($errorMessage);
        
        header("HTTP/1.1 404 Not Found");
        echo $e->getMessage();
    }
}
