<?php
session_start();
include 'conexion.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $accion=$_POST['accion'] ?? "";

    if($accion === 'Agregar'){
        $nombre_materia=trim($_POST['nom_mat'] ?? "");
        $fecha=trim($_POST['fech_mat'] ?? "");
        $estado=intval($_POST['est_mat'] ?? 0);

        if ($nombre_materia === "" || $fecha === "" || $estado === 0) {
            $_SESSION['mensaje'] = "Llenar todos los campos del formulario";
            header("Location: pag1.php?seccion=matfin");
            exit();
        }

        $stmt = mysqli_prepare($conn, "INSERT INTO materias (nombre_materia, fecha, id_estado) VALUES (?, ?, ?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $nombre_materia, $fecha, $estado);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['mensaje'] = "Materia agregada exitosamente";
                header("Location: pag1.php?seccion=matfin");
                exit();
            } else {
                echo "  Error al guardar: " . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        }
    }else{
        if($accion === 'Eliminar'){
            $id_mat = intval($_POST['id_materia'] ?? 0);

            if($id_mat > 0){
                $stmt = mysqli_prepare($conn, "DELETE FROM materias WHERE id_materia = ?");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "i", $id_mat);
                    if (mysqli_stmt_execute($stmt)) {
                        $_SESSION['mensaje'] = "Materia eliminada correctamente";
                        header("Location: pag1.php?seccion=matfin");
                        exit();
                    } else {
                        echo "  Error al eliminar: " . mysqli_stmt_error($stmt);
                    }
                    mysqli_stmt_close($stmt);
                }
            }
        }
    }
}
mysqli_close($conn);
?>