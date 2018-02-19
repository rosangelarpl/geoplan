<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$assunto = $_POST['assunto'];

require_once('classes/Exception.php');
require_once('classes/OAuth.php');
require_once('classes/PHPMailer.php');
require_once('classes/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 2; 
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = "bwbr21@gmail.com";
$mail->Password = "4093287615";

$mail->setFrom("bwbr21@gmail.com", "Geoplan");
$mail->addAddress("bwbr21@gmail.com");
$mail->Subject = "Contato Geoplan - {$assunto}";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail: {$email}\nmensagem: {$mensagem}";

if($mail->send()){
	header("Location: contato.php?enviou=1");

} else {
	echo $mail->ErrorInfo;
}
die();