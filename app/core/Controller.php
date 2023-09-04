<?php

namespace Core;

use Core\View;

class Controller
{
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }
}
?>