<?php
class View
{
    private $data = array();
    
    function assign($varname,$vardata){
        $this->data[$varname] = $vardata;
    }

    function display($filename){
        extract($this->data);
        include($filename);
    }
}
?>