<?php
include('system/view.php');

class DefaultController
{
    private $view;

    function __construct() {
        $this->view = new View();
        $this->index();
    }
    
    public function index() {
        $this->view->display('view/default.php');
    }
}
?>