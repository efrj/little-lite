<?php

if(!empty($_SERVER['QUERY_STRING'])) {
    
    $queryArray = explode('/',$_SERVER['QUERY_STRING']);

    $controllerFile = 'controller/' . $queryArray['0'] . '.php';

} else {
    $controllerFile = 'controller/DefaultController.php';
}

include_once($controllerFile);

$controller = (isset($queryArray['0'])) ? new $queryArray['0'] : new DefaultController;

if (isset($queryArray['1'])) {
    
    $action = $queryArray['1'];

    if(isset($queryArray['2'])) {
        $controller->$action($queryArray['2']);
    } else {
        $controller->$action();
    }
}
?>