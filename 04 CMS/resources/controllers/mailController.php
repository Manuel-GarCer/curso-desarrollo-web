<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //require 'vendor/autoload.php'; //OJO: para mandar correo de supcritor tiene q estar habilidad, 
                                    // OJO: para entrar a "admin" tiene q estar desabilitada
    
    function send_email($email, $asunto, $mensaje){ //funcion para mandar correo electronico
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username ="dadee1bac43e30";
        $mail->Password = "5f36ede59a7f21";
        $mail->Port = 25;
        $mail->SMTPSecure = 'tls';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('registro@mipagina.com', 'Registro');
        $mail->addAddress($email);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        if($mail->send()){
            $emailSent = true;
        }

        }


?>