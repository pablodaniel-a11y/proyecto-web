<?php 
session_start();
require_once 'header.php';
?>

    <?php
    $seccion=isset($_GET['seccion']) ? $_GET['seccion']: 'unsa';
    switch($seccion){
        case 'matfin':
            include 'conexion.php';
            $resultado_mat=mysqli_query($conn, "SELECT id_materia,nombre_materia, fecha, id_estado FROM materias ORDER BY id_estado DESC");
    ?>
    <article class="formulario_tabla">
        <h2>Materias a Finalizar</h2>
        <div class="contiene_titulo">
            <h3>Modificar Tabla: </h3>
            <p> 
            Se puede completar los datos para realizar una modificacion de la tabla, 
            ya sea Agregar o Eliminar una materia, se realizara la actualizacion en la pagina.
            </p>
        </div>
        <form action="finalizar_materia.php" method="post">
            <label for="nom_mat"> Nombre de la Materia: </label>
            <input type="text" id="nom_mat" name="nom_mat" placeholder="Ingresar Materia" />
            <br><label for="fech_mat"> Fecha de Curzado: </label>
            <input type="date" id="fech_mat" name="fech_mat" placeholder="Ingresar Apellido" />
            <br><label for="est_mat"> Estado de la Materia: </label>
            <select id="est_mat" name="est_mat">
                <option value="1">Regularizada </option>
                <option value="2">Libre </option>
                <option value="3">Promocionado </option>
            </select>
            <br><button type="submit" name="accion" value="Agregar"> Guardar Materia </button>
            <button type="reset"> Borrar Datos</button>
        </form>
        
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="mensaje_exito" style="background-color: #d4edda; color: #155724; padding: 10px 15px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
                <?php 
                    echo htmlspecialchars($_SESSION['mensaje']); 
                    unset($_SESSION['mensaje']);
                ?>
            </div>
        <?php endif; ?>

    </article>
    <article class="tabla_fin">
        <table>
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Fecha Curzado</th>
                        <th>Estado</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($resultado_mat && mysqli_num_rows($resultado_mat)>0){
                        while ($row = mysqli_fetch_assoc($resultado_mat)){
                            $texto_estado = "Desconocido";
                            if ($row['id_estado'] == 1) $texto_estado = "Regularizada";
                            if ($row['id_estado'] == 2) $texto_estado = "Libre";
                            if ($row['id_estado'] == 3) $texto_estado = "Promocionado";
                        
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['nombre_materia']); ?> </td>
                            <td><?php echo htmlspecialchars($row['fecha']); ?></td>
                            <td><?php echo htmlspecialchars($texto_estado); ?></td>
                            <td>
                                <form action="finalizar_materia.php" method="POST" onsubmit="return confirm('Esta seguro de eliminar esta materia?');">
                                    <input type="hidden" name="id_materia" value="<?php echo (int)$row['id_materia']; ?>">
                                    <button type="submit" name="accion" value="Eliminar" class="boton_eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    }else{
                        echo '<tr><td colspan="3">No hay materias registradas.</td></tr>';
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
    </article>
    <?php
        break;
        case 'matcurz':
    ?>

    <article class="formulario_tabla">
        <h2>Materias Cursando</h2>
        <div class="contiene_titulo">
            <h3>Modificar Tabla: </h3>
            <p> 
            Se puede completar los datos para realizar una modificacion de la tabla, 
            ya sea Agregar o Eliminar una materia, se realizara la actualizacion en la pagina.
            </p>
        </div>
        <form>
        </form>
    </article>
    <article>
        <table id="prueba">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Fecha inicio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Programacion Numerica</td>
                    <td>12/12/2025</td>
                </tr>
                <tr>
                    <td>Probabilidad y Estadistica</td>
                    <td>12/12/2026</td>
                </tr>
                <tr>
                    <td>Programacion Numerica</td>
                    <td>12/12/2025</td>
                </tr>
                <tr>
                    <td>Programacion Numerica</td>
                    <td>12/12/2025</td>
                </tr>
            </tbody>
        </table>
    </article>
    <?php
        break;
        default:
            echo "<p>Página no encontrada.</p>";
        break;
    }
    ?>
</section>

<?php require_once 'footer.php'; ?>