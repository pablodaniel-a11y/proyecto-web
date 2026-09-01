<article class="formulario_tabla">
    <h2> Editar Materia </h2>
    <form id="form_edit" action="../Public/index.php?accion=actualizar" method="post">
        <input type="hidden" name="id_materia" value="<?php echo htmlspecialchars($materia['id_materia'] ?? ''); ?>" />
        <label for="nom_mat"> Nombre de la Materia: </label>
        <input type="text" id="nom_mat" name="nom_mat" value="<?php echo htmlspecialchars($materia['nombre_materia'] ?? ''); ?>" />
        <br><label for="fech_mat"> Fecha de Curzado: </label>
        <input type="date" id="fech_mat" name="fech_mat" value="<?php echo htmlspecialchars($materia['fecha'] ?? '')  ?>" />
        <br><label for="est_mat"> Estado de la Materia: </label>
        <select id="est_mat" name="est_mat">
            <option value="1" <?php echo (isset($materia['id_estado'])&& $materia['id_estado']==1) ? 'selected' : ''; ?>>Regularizada </option>
            <option value="2" <?php echo (isset($materia['id_estado'])&& $materia['id_estado']==2) ? 'selected' : ''; ?>>Libre </option>
            <option value="3" <?php echo (isset($materia['id_estado'])&& $materia['id_estado']==3) ? 'selected' : ''; ?>>Promocionado </option>
        </select>
        <br>
        <div class="caja_botones">
        <button type="submit">Actualizar Materia</button>
        <a href="index.php?seccion=matfin" class="boton_cancelar">Cancelar</a>
        </div>
    </form>
</article>