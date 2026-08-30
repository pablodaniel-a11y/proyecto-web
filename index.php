<?php
require_once "header.php"
?>

<section>
    <?php
    $seccion=isset($_GET['seccion']) ? $_GET['seccion']: 'unsa';
    switch($seccion){
        case 'unsa':
    ?>
    <article class="art2">
        <img class="imgunsa" src="img/UNSa_logo.png">
        <p>
            La Universidad Nacional de Salta (UNSa) es una universidad publica argentina de derecho publico,
            <br> autonoma y autarquica, que tiene como fin promover, difundir y preservar la cultura de la comunidad
            <br> en la cual esta inserta, para lo cual contribuye con estudios humanisticos, investigacion cientifica,
            <br> tecnologica y la creacion artistica. Asimismo, difunde sus actividades a traves de diferentes medios
            <br> de comunicacion. Con sede central en la ciudad de Salta. Ademas tiene sedes regionales en Tartagal,
            <br> San Ramon de la Nueva Oran, Rosario de la Frontera y San Jose de Metan. 
        </p>
        <p><a target="_blank" href="https://www.unsa.edu.ar/la-universidad/"> Link de la Unsa</a></p>
        <p>
            El Diseño del Escudo de la UNSa es obra del escritor y reconocido artista plastico Osvaldo JUANE (1928-1988),  
            cuya obra esta plasmada en viviendas particulares, en publicaciones y colecciones de proyeccion nacional e internacional.
            Como Coordinador del Taller de Plastica del Servicio de Accion Cultural de esta Universidad, el Rector Normalizador Holver Martinez Borelli, 
            le encomendo diseñar el escudo y el 8 de julio de 1974 su propuesta, fue adoptada como Escudo Oficial de la Universidad Nacional de Salta,  
            a traves de la Resolucion Nº 483/74. En este documento se destaca que: "configura una obra que, con sus relevantes valores plasticos, 
            representa el ambito natural de la Universidad Nacional de Salta y asume graficamente las resonancias del paisaje centro-sudamericano, 
            complementandose armoniosamente con el lema, incluido en su composicion"… "contando asi con los elementos esenciales que nuestra comunidad aspira a plasmar en el Escudo de esta Casa".
            El diseño incluye el lema: "MI SABIDURIA VIENE DE ESTA TIERRA", autoria de los escritores salteños Manuel J. Castilla y Holver Martinez Borelli. 
            La vigencia de esta obra, acompaño los procesos que vividos por el pais y por la misma Universidad. 
            Asi, durante el periodo 1975-1986, se suspendio su uso y su restablecimiento se efectuo durante la gestion del Rector Juan Carlos Gottifredi, como reflejo de los ideales que consagra la creación de la Universidad y su Estatuto.
            En el año 2005, el artista Osvaldo JUANE fue declarado Doctor Honoris Causa de esta Universidad.
        </p>
    </article>

    <?php
        break;
        case 'perfil':
    ?>
    <article id="pb">
            <h3>Perfil Basico</h3>
            <p> Hola mi nombre es pablo, soy un estudiante de la facultad de ciencias exactas de la carrera "Tecnicatura Universitaria en Programacion (TUP)".
                <br> Este seria la primera vez que realmente realizo un activadad con html por lo tanto puede haber errores en esta pagina
            </p>
    </article>

    <?php
        break;
        case 'contacto':
    ?>
    <article id="cont">
        <h3> Enviar Mensaje</h3>
        <p> Puedes hablerme en <span>pp159723@gmail.com</span> para comunicarnos </p>
        <br>
        <form action="contacto.php" method="post">
            <label for="nombre"> Nombre: </label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresar Nombre" />
            <br><label for="apellido"> Apellido: </label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingresar Apellido" />
            <br><label for="contacto"> Contacto: </label>
            <input type="text" id="contacto" name="contacto" placeholder="Ingresar contacto" />
            <br><label for="comentario"> Comentario: </label>
            <br><textarea cols="50" rows="10" id="comentario" name="comentario" placeholder="ingresar comentario"></textarea>
            <br><button type="submit"> Enviar Mensaje</button>
            <button type="reset"> Borrar Mensaje</button>
        </form>
    </article>
    <?php
        break;
        case 'fac_exact':
    ?>
    <article class="facultad_exact">
        <p>
            La Facultad de Ciencias Exactas es una de las unidades academicas de la Universidad Nacional de Salta. 
            Forma profesionales, docentes e investigadores en matemática, física, química e informática, y desarrolla tareas de investigación, extensión y transferencia al medio.
        </p>
        <h3><span>Como se organiza:</span></h3>
        <p>
            La Facultad se gobierna con el Consejo Directivo, cuerpo colegiado integrado por representantes de los distintos claustros,
            y con el Decanato, a cargo de la conducción ejecutiva junto a las secretarías.
            <br> <br>
            La actividad académica se organiza en cuatro departamentos docentes —Matemática, Física, Química e Informática—, que agrupan a las cátedras y al personal docente de su área.
        </p>
        <ul>
            <li>Autoridades — decanato y secretarías.</li>
            <li>Consejeros — integrantes del Consejo Directivo por claustro.</li>
            <li>Departamentos docentes — los cuatro departamentos y sus autoridades.</li>
            <li>Administración — las áreas administrativas, con su horario de atención y contacto.</li>
        </ul>
    </article>
    <?php
        break;
        case 'carrera':
    ?>
    <article>
        <h3>Grado</h3>
        <ul>
            <li>Lic. En Analisis de Sistemas </li>
            <li>Licenciatura en Matematicas </li>
            <li>Profesorado en Matematica </li>
            <li>Licenciatura en Fisica </li>
            <li>Profesorado en Fisica </li>
            <li>Licenciatura en Energias Renovables </li>
            <li>Licenciatura en Quimica </li>
            <li>Profesorado en Quimica </li>
            <li>Licenciatura en Bromatologia</li>
        </ul>
        <h3>Pregrado</h3>
        <ul>
            <li>Tecnicatura Universitaria en Programación </li>
            <li>Tecnicatura Universitaria en Estadistica </li>
            <li>Tecnicatura Electronica Universitaria </li>
            <li>Tecnicatura Universitaria en Energia Solar </li>
            <li>Analista Quimico </li>
        </ul>
        <h3>Posgrado</h3>
        <ul>
            <li>Doctorado en Ciencias - Area Energias Renovables </li>
            <li>Doctorado en Ciencias - Area Quimica Aplicada </li>
            <li>Maestria en Energias Renovables </li>
            <li>Maestria en Matematica Aplicada </li>
            <li>Especializacion en Energias Renovables </li>
        </ul>
    </article>
    <?php
        break;
        case 'tup':
    ?>
    <article>
        <h1>Tecnicatura Universitaria en Programación <h1>
        <h2>Título que otorga: Técnico Universitario en Programación<h2>
        <h2>Duración: 3 Años Cantidad de Materias: 17 <h2>
        <table>
            <thead>
                <tr>
                    <th>año</th>
                    <th>Cuat.</th>
                    <th>Materia</th>
                    <th>Cursar</th>
                    <tr>
                        <th>Regular</th>
                        <th>Aprobado</th>
                    </tr>
                    <th>Rendir</th>
                    <tr>
                        <th>Aprobado</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1°</td>
                    <td>I</td>
                </tr>
            </tbody>
        </table>
    </article>
    <?php
        break;
        default:
            echo "<p>Pagina no encontrada.</p>";
        break;
    }
    ?>
<?php
require_once "footer.php"
?>