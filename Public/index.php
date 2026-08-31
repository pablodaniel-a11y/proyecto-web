<?php
session_start();
require_once __DIR__ . "/../Controllers/materiacontroller.php";

$controller=new materiacontroller();
$accion=$_GET['accion'] ?? 'secciones';

if(method_exists($controller,$accion)){
    $controller->$accion();
}else{
    $controller->secciones();
}