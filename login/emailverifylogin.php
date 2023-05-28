<?php
    session_start();
    error_reporting(0);
require_once ("../include/config.php");
require_once('../include/PHPMailer-master/src/PHPMailer.php');
require_once('../include/PHPMailer-master/src/SMTP.php');
require_once('../include/PHPMailer-master/src/Exception.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
$date = date('Y-m-D');
$mail = new PHPMailer();

$mail->CharSet =  "utf-8";
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;                  
$mail->SMTPSecure = "ssl";
$mail->Port = "465";
$mail->Username = constant("HOST_EMAIL");
$mail->Password = constant("HOST_APP_PW");
$mail->Subject  =  'Verification Code';
$mail->From = constant("HOST_EMAIL");
$mail->FromName = 'Himlayang Pilipino Memorial Park';

$mail->AddAddress($_SESSION['email']);
$mail->IsHTML(true);
// $mail->msgHTML(file_get_contents('message.html'));
// $mail->Body    = 'Click On This Link to Verify Email '.$link.'';
$html = file_get_contents('verification.html');
$html = str_replace("[date today]",$date,$html);
$html = str_replace("[logincode]",$_SESSION['num'],$html);
$mail->Body = $html;
// $mail->str_replace("[receiver name]",$user_firstname.''.$user_lastname,$mail);
if($mail->Send())
{
$mess = "Check Your Email inbox and Click on the email verification link.";
header("location: adminemailconfirmation.php");
}
else
{
echo "Mail Error - >".$mail->ErrorInfo;
}

$stmt->close();








?>