<?php

include('vendor/autoload.php');

if(!empty($_SERVER['QUERY_STRING'])) {
    
    $queryArray = explode('/',$_SERVER['QUERY_STRING']);

    $controllerFile = 'app/controllers/' . $queryArray['0'] . '.php';

} else {
    $controllerFile = 'app/controllers/DefaultController.php';
}

include_once($controllerFile);

$newController = '\Controllers\DefaultController';
if (isset($queryArray['0'])) {
    $newController = '\Controllers\\' . $queryArray['0'];
}

$controller = new $newController();

if (isset($queryArray['1'])) {
    
    $action = $queryArray['1'];

    if(isset($queryArray['2'])) {
        $controller->$action($queryArray['2']);
    } else {
        $controller->$action();
    }
}
?>