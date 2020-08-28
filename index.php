<?php
session_start();
date_default_timezone_set('America/Bogota');
require_once "model/conexion.php";
$controller = "user";
if (!isset($_SESSION['id']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;

    if (isset($_REQUEST['c']) and $_REQUEST['a'])
    {
        $email    = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $controller->validate($email, $password);
    }
    else
    {
        $controller->login();
    }
}
else
{
    require_once "model/conexion.php";
    $controller = "user";
    if (!isset($_REQUEST['c'])) {
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller).'Controller';
        $controller = new $controller;
        $controller->index();
    } else {
        // Obtenemos el controlador que queremos cargar
        $c = Conexion::encryptor('decrypt', $_REQUEST['c']);
        $a = Conexion::encryptor('decrypt', $_REQUEST['a']);

        $controller = strtolower($c);
        $accion = isset($a) ? $a : 'index';

        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller).'Controller';
        $controller = new $controller;

        // Llama la accion
        call_user_func(array( $controller, $accion ));
    }
}
