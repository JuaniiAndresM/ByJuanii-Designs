<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'byjuaniidesigns@gmail.com';            // SMTP username
    $mail->Password   = 'byjuaniidesigns2003';                  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->CharSet = 'UTF-8';
    $mail->setFrom($email, $nombre);
    $mail->addAddress('byjuaniidesigns@gmail.com');             // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Nueva solicitud de contacto | ByJuanii Designs';
    $mail->Body    = '<html>
        <body>
            <center>
                <div class="form-wrapper" style="background-color:white; margin: 5% 0; width: 200px; border-radius: 25px; border: 1px solid #333333">
                    <div class="form-logo">
                        <img class="logo" src="https://i.postimg.cc/63zyWM48/logo.jpg" style="width: 50%;">
                    </div>
                    <div class="input-wrapper" style="text-align: center">
                        <p><b>Nombre:</b></p>
                        '.$nombre.'                            
                        <p><b>Email:</b></p>
                        '.$email.'
                        <p><b>Comentario:</b></p>
                        '.$comentario.'
                    </div>
                </div>
            </center>
        </body>
    </html>';

    $mail->send();
    header("Location: success.html");
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}