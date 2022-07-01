<?php
namespace Controllers;

use Controllers\Controller;

class DefaultController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->index();
    }
    
    public function index()
    {
        $this->view->display('default.php');
    }
}
?>