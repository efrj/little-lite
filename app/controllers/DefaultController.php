<?php
namespace Controllers;

use Controllers\Controller;

class DefaultController extends Controller
{   
    public function index()
    {
        $this->view->display('default');
    }
}
?>