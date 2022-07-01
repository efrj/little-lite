<?php
namespace Core;

class View
{
    public $data = array();
    
    public function assign($varname,$vardata) {
        $this->data[$varname] = $vardata;
    }

    public function display($filename) {
        extract($this->data);
        include(__DIR__ . '/../views/' . $filename);
    }
}
