<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil personal</title>
    <link rel="stylesheet" href="/proyecto/estiloscss/estiloglobal.css"/>
    <link rel="stylesheet" href="/proyecto/estiloscss/first.css"/>
    <link rel="stylesheet" href="/proyecto/estiloscss/second.css"/>
    <!-- 
    <link rel="stylesheet" href="../estiloscss/estiloglobal.css"/>
    <link rel="stylesheet" href="../estiloscss/first.css"/>
    <link rel="stylesheet" href="../estiloscss/second.css"/>
    -->
</head>
<body>
    <header>
        <h1 id="Titulo">Perfil de Estudiante</h1>
        <h2>Pablo Calpanchay</h2>
        <ul>
            <li><a href="index.php?seccion=unsa" class="active"> UNSA </a></li>
            <li class="downopc">
                <a href="index.php?seccion=fac_exact" class="downref"> Facultad Cs. Exactas </a>
                <div class="dropdown-content">
                    <a href="index.php?seccion=carrera"> Carreras </a>
                    <a href="index.php?seccion=tup"> TUP</a>
                </div>
            </li>
            <li class="downopc">
                <a href="index.php?seccion=perfil" class="downref"> Perfil Basico</a>
                <div class="dropdown-content">
                    <a href="index.php?seccion=contacto"> Contacto </a>
                </div>
            </li>
            <li class="downopc">
                <a href="index.php?seccion=tup" class="downref"> Materias </a>
                <div class="dropdown-content">
                    <a href="index.php?seccion=matfin"> Materias a Finalizadas</a>
                </div>
            </li>
        </ul>
    </header>