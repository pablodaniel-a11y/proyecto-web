<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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

    /*
    $mensaje_exitoso="Mensaje Enviado<br>";
    $mensaje_exitoso.="Nombre: ".$nombre."<br>";
    $mensaje_exitoso.="Apellido: ".$apellido."<br>";
    $mensaje_exitoso.="Contacto: ".$contacto."<br>";
    $mensaje_exitoso.="Comentario: ".$comentario."<br>";

    if (isset($mensaje_exitoso)) {
        echo "<p style='color: green;'>" . $mensaje_exitoso . "</p>";
    }
    */
}


?>