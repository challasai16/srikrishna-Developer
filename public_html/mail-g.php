<?php

use PHPMailer\PHPMailer\PHPMailer;
 require_once 'PHPMailer/Exception.php';
 require_once 'PHPMailer/PHPMailer.php';
 require_once 'PHPMailer/SMTP.php';

//Load Composer's autoloader
// require 'vendor/autoload.php';

 $mail = new PHPMailer(true);
// Retrieve form data



if (array_key_exists('submit-from', $_POST)) {
    $err = false;
    $msg = '';
    $email = '';
    
 
    if (array_key_exists('message', $_POST)) {
        $message = substr(strip_tags($_POST['message']), 0, 16384);
    } else {
        $message = '';
        $msg = 'No message provided!';
        $err = true;
    }
 
    if (array_key_exists('name', $_POST)) {
        $name = substr(strip_tags($_POST['name']), 0, 255);
    } else {
        $name = '';
    }
     if (array_key_exists('countrycode', $_POST)) {
            $countrycode = substr(strip_tags($_POST['countrycode']), 0, 255);
        } else {
            $countrycode = '';
        }
    if (array_key_exists('mobilenumber', $_POST)) {
            $mobilenumber = substr(strip_tags($_POST['mobilenumber']), 0, 255);
        } else {
            $mobilenumber = '';
        }
    $to = 'nagaraju@madworks.in';
        
    if (array_key_exists('email', $_POST) and PHPMailer::validateAddress($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $msg = "Error: invalid email address provided";
        $err = true;
    }
    
     if (array_key_exists('projectoption', $_POST) and PHPMailer::validateAddress($_POST['projectoption'])) {
        $projectoption = $_POST['projectoption'];
    } else {
        $projectoption = "Error: invalid  details provided";
        $err = true;
    }
    
    if (!$err) {
        $mail = new PHPMailer;
        $mail->isSMTP();
         $mail->SMTPDebug = 4;
        $mail->Host = 'localhost';
        $mail->Username = "leads@srikrishnadeveloppers.com";
        $mail->Password = "leads@123";
        $mail->Port = 25;
        $mail->CharSet = 'utf-8';
        $mail->setFrom('leads@srikrishnadeveloppers.com', (empty($name) ? 'Contact form' : $name));
        $mail->addAddress($to);
        $mail->addReplyTo($email, $name);
        $mail->Subject = 'New message from website visitor!';
        $mail->Body = "Contact form submission\n\n" . $message;
        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $msg .= "Message sent!";
        }
    }
}
?>

