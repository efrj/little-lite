<?php

include('vendor/autoload.php');

if(!empty(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) && parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) !== '/')) {
    $queryArray = explode('/', parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $controllerFile = 'app/controllers/' . ucfirst($queryArray['1']) . 'Controller.php';
} else {
    $controllerFile = 'app/controllers/DefaultController.php';
}

include_once($controllerFile);

$newController = '\Controllers\DefaultController';
if (isset($queryArray['1'])) {
    $newController = '\Controllers\\' . ucfirst($queryArray['1']) . 'Controller';
}

$controller = new $newController();

if (isset($queryArray['2'])) {
    $action = $queryArray['2'];
} else {
    $action = 'index';
}

if(isset($queryArray['3'])) {
    $controller->$action($queryArray['3']);
} else {
    $controller->$action();
}

?>