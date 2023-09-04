<?php

namespace Core;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class View
{
    public $data = array();
    private $logger; // Adicione uma propriedade para o Logger
    private $logPath = __DIR__ . '/../logs/app.log';

    public function __construct()
    {
        $this->logger = new Logger('view_logger');
        $this->logger->pushHandler(new StreamHandler($this->logPath, Logger::DEBUG));
    }
    
    public function assign($varname, $vardata)
    {
        $this->data[$varname] = $vardata;
    }

    public function display($filename)
    {
        extract($this->data);

        try {
            $viewFilePath = __DIR__ . '/../views/' . $filename . '.php';
            if (!file_exists($viewFilePath)) {
                throw new \Exception("View file not found: $viewFilePath");
            }

            include($viewFilePath);
        } catch (\Exception $e) {
            $errorMessage = "Error displaying view: $filename - " . $e->getMessage();
            $this->logger->error($errorMessage);
        }
    }
}
