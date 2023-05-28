<?php
require_once ("include/config.php");
require_once ("include/PHPMailer-master/src/Exception.php");
require_once ("include/PHPMailer-master/src/PHPMailer.php");
require_once ("include/PHPMailer-master/src/SMTP.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!empty($_POST["send"])) {
	$visitorname = $_POST["userName"];
	$visitoremail = $_POST["userEmail"];
	$emailsubject = $_POST["subject"];
	$visitormessage = $_POST["content"];

	global $mysqli;

	$mail = new PHPMailer;
	$mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = constant("HOST_EMAIL");
    $mail->Password = constant("HOST_APP_PW");
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->From= constant("HOST_EMAIL");
    $mail->FromName='Himlayang Pilipino Memorial Park';
	$mail->addAddress(constant("HOST_EMAIL"),'Himlayang Pilipino Memorial Park');
	$mail->Subject = $emailsubject;
	$mail->IsHTML(true);
	$content = '
	<table align="center" cellspacing="3" cellpadding="3" bgcolor="#d0f2f2">
		<tbody>
			<tr>
				<th>Name: </th><td>'.$visitorname.'</td>
			</tr>
			<tr>
				<th>Email: </th><td>'.$visitoremail.'</td>
			</tr>
			<tr>
				<th>Subject: </th><td>'.$emailsubject.'</td>
			</tr>
			<tr>
				<th>Message: </th><td>'.$visitormessage.'</td>
			</tr>
		</tbody>
	</table>
	<p align="center">http://localhost/index.php (Himlayang Pilipino Memorial Park)</p>';
	$mail->MsgHTML($content);
	if ($mail->Send()) {
		$message = '<label class="alert alert-success alert-dismissible" style="width:100%;padding:10px;font-size:11px">An email has been sent..<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:5px"><span aria-hidden="true">&times;</span></button></label>';
	    $type = "success";
	} else {
		$message = '<label class="alert alert-danger alert-dismissible" style="width:100%;padding:10px;font-size:11px">There was an error while sending the email.<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:5px"><span aria-hidden="true">&times;</span></button></label>';
	    $type = "danger";
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
}
require_once "contactform.php";
?>