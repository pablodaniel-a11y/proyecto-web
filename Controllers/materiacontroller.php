<?php

require_once __DIR__ . "/../Config/conexion.php";
require_once __DIR__ . "/../Models/materia.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class materiacontroller{
    private $materiamodel;

    public function __construct(){
        global $conn;
        $this->materiamodel=new materia($conn);
    }

    public function guardar(){
        session_start(); //fue mi caso por el mensaje
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre_materia=trim($_POST['nom_mat'] ?? "");
            $fecha=trim($_POST['fech_mat'] ?? "");
            $estado=intval($_POST['est_mat'] ?? 0);

            if ($nombre_materia === "" || $fecha === "" || $estado === 0) {
                $_SESSION['mensaje'] = "Llenar todos los campos del formulario";
            }else{
                $this->materiamodel->create($nombre_materia,$fecha,$estado);
                $_SESSION['mensaje'] = "Materia agregada exitosamente";
            }
            header("Location: index.php?action=index"); //aca tengo que agregar la direccion despues de hacer las correcciones de index y pag1
            exit();
        }
    }

    public function eliminar(){
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id_mat = intval($_POST['id_materia'] ?? 0);
            if($id_mat > 0){
                $this->materiaModel->delete($id_mat);
                $_SESSION['mensaje'] = "Materia eliminada correctamente";
            }
            header("Location: index.php?action=index");
            exit();
        }
    }

    public function secciones(){
        $seccion = $_GET['seccion'] ?? 'unsa';
        require_once __DIR__ . "/../Views/Layout/header.php";
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
            default:
                echo "<p>Página no encontrada.</p>";
                break;
        }
        require_once __DIR__ . "/../views/layouts/footer.php";
    }

    public function enviarcontacto(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre=trim($_POST['nombre'] ?? "");
            $apellido=trim($_POST['apellido'] ?? "");
            $contacto=trim($_POST['contacto'] ?? "");
            $comentario=trim($_POST['comentario'] ?? "");

            if ($nombre === "" || $apellido === "" || $contacto === "" || $comentario === "") {
                exit("Por favor, complete todos los campos obligatorios.");
            }

            if (!filter_var($contacto, FILTER_VALIDATE_EMAIL)) {
                exit("El formato del email no es valido.");
            }
            
            
            require_once __DIR__ . '/../PHPMailer/src/Exception.php';
            require_once __DIR__ . '/../PHPMailer/src/PHPMailer.php';
            require_once __DIR__ . '/../PHPMailer/src/SMTP.php';

            $mail = new PHPMailer(true);
    
            try{
                $mail->isSMTP();
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = '358d2d29302ee5';
                $mail->Password = 'fbd6b5076c3587';
                $mail->Port = 2525;


                $mail->setFrom('web@ejemplo.com','Mi sitio web');
                $mail->addAddress('destino@ejemplo.com');
                $mail->addReplyTo($contacto, $nombre.' '.$apellido);

                $mail->isHTML(true);
                $mail->Subject = 'Nuevo mensaje de contacto de ' . $nombre . ' ' . $apellido;
                $mail->Body = "
                <h2>Nuevo mensaje de contacto</h2>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Apellido:</strong> $apellido</p>
                <p><strong>Email:</strong> $contacto</p>
                <p><strong>Mensaje:</strong> $comentario</p>
                ";

                $mail->send();
                echo "Mensaje enviado correctamente.";
            } catch (Exception $e){
                echo "No se pudo enviar el mensaje.";
            }
        }
    }
}