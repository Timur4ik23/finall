<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;
        $mail->Username   = 'payeer931@gmail.com';  
        $mail->Password   = 'bqih dswb apuu pxmt';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;  


        $mail->setFrom('payeer931@gmail.com', 'DevTeam');  
        $person = $_POST['email'];
        $mail->addAddress($person);  


        $mail->isHTML(true);
        $mail->Subject = 'Confirmation';
        $mail->Body    = 'Congratulations!!! Your audio was successfully uploaded!)';


        $mail->send();
        
        echo "Audio file uploaded successfully. Confirmation sent to your email.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>    