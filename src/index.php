<?php

$nutteloospath = "/framework/level%201/Routing-6b869501/src/";
($_SERVER['REQUEST_URI']);
$shorterPath = (str_replace($nutteloospath, "", $_SERVER['REQUEST_URI']));
$givenRoute = explode("/", $shorterPath);
if (!isset($givenRoute[0])) {
    die("geen path gegeven");
}
if (!isset($givenRoute[1])) {
    die("geen method gegeven");
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
    die("error 404");
}

$controllerClass->$method();
