<?php

$nutteloospath = "/framework/level%201/Routing-6b869501/src/";
($_SERVER['REQUEST_URI']);
$shorterPath = (str_replace($nutteloospath, "", $_SERVER['REQUEST_URI']));
$givenRoute = explode("/", $shorterPath);
$pathLength = strlen($givenRoute[0]);
if ($pathLength === 0) {
    require_once("controllers/homecontroller.php");
    $home = new home;
    $home->index();
    die();
}
if (!isset($givenRoute[1])) {
    die("no method");
}
$controller = $givenRoute[0];
$method = $givenRoute[1];
$checkControllerPath = "controllers/" . $controller . "controller.php";


if (!file_exists($checkControllerPath)) {
    (http_response_code(404));
    die("error 404");
}
require_once($checkControllerPath);
$controllerClass = new $controller;

if (!method_exists($controllerClass, $method)) {
    (http_response_code(404));
    die("error 404 no method found");
}

$controllerClass->$method();
