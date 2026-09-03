<?php
session_start();
require_once __DIR__ . "/../Config/conexion.php";
require_once __DIR__ . "/../Controllers/materiacontroller.php";
require_once __DIR__ . "/../Models/materia.php";

if(isset($_GET['accion'])){
    $controller=new materiacontroller();
    $accion=$_GET['accion'];

    if(method_exists($controller,$accion)){
    $controller->$accion();
    }
    exit();
}

$seccion = $_GET['seccion'] ?? 'unsa';
$materiamodel = new materia($conn);

require_once __DIR__ . "/../Views/Layout/header.php";
echo '<section>'; //me di cuenta que perdi algunos cambios de css por quitarlo
switch($seccion){
    case 'unsa':
        require_once __DIR__ . "/../Views/Home/unsa.php";
        break;
    case 'perfil':
        require_once __DIR__ . "/../Views/Home/perfil.php";
        break;
    case 'contacto':
        require_once __DIR__ . "/../Views/Home/mi_contacto.php";
        break;
    case 'fac_exact':
        require_once __DIR__ . "/../Views/Home/facultad.php";
        break;
    case 'carrera':
        require_once __DIR__ . "/../Views/Home/carreras.php";
        break;
    case 'tup':
        require_once __DIR__ . "/../Views/Home/tup.php";
        break;
    case 'matfin':
        $materias=$materiamodel->getAll();
        require_once __DIR__ . "/../Views/Materias/index.php";
        break;
    case 'editar':
        $id = intval($_GET['id'] ?? 0);
        $materia=$materiamodel->getById($id);
        require_once __DIR__ . "/../Views/Materias/edit.php";
        break;
    default:
        echo "<p>Página no encontrada.</p>";
        break;
}
echo '</section>';
require_once __DIR__ . "/../Views/Layout/footer.php";