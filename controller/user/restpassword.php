<?php
require_once 'auth.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
$mail = new PHPMailer(true);


$email = $_POST['email'];
$user = new Auth();


if($user->user_email($email)) {

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.mailtrap.io';
        $mail->SMTPAuth   = true;
        $mail->Username   = '261b29ff525923';
        $mail->Password   = 'df451ee1098642';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('info@gmail.com','Milater');
        $mail->addAddress($email);


        $body = '<H3>Click the below link to reset your password. <br><a href="http://localhost/crm/view/rest_password.php?gmail='.$email.'">
http://localhost/crm/view/rest_password.php?gmail='.$email.'
</a>Regards<br>mohamed hussein</H3>';
        $mail->isHTML(true);
        $mail->Subject = 'Rest Password <BR>';
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        header('Location:../../view/forgetpassword.php?success=we sent verification in your email! please check it ');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
else
{
    header('Location:../../view/forgetpassword.php?fail=This Email NOt Exist! tray again');
}

