<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cabecerainicio.css">
</head>
<body>
<header>
    <img src="https://image.freepik.com/vector-gratis/plantilla-logo-compania-informatica_1061-62.jpg" alt="">
<nav>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="index.html">Alumno</a></li>
            <li><a href="index.html">Curso</a></li>
                      
        </ul>       
    </nav>
    </header>
<?php
require_once 'model/database.php';

$controller = 'alumno';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>
</body>
</html>
