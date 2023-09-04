<?php

namespace Controllers;

use Core\Controller;

class DefaultController extends Controller
{   
    public function index()
    {
        $this->view->display('default');
    }
}
?>