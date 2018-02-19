<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if(!empty($_POST)) {

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];
  $assunto = $_POST['assunto'];

  require_once('classes/Exception.php');
  require_once('classes/OAuth.php');
  require_once('classes/PHPMailer.php');
  require_once('classes/SMTP.php');


  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPDebug = 2; 
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;
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
}

?>

<!-- Contact section -->
<div class="contact-section spad">
  <div class="overlay"></div>
  <div class="container">

    <div class="row">
      <!-- contact form -->
      <div class="col-md-6">
        <form class="form-class" id="con_form" method="post" action="contato">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="nome" placeholder="Seu nome">
            </div>
            <div class="col-sm-6">
              <input type="text" name="email" placeholder="Seu email">
            </div>
            <div class="col-sm-12">
              <input type="text" name="assunto" placeholder="Subject">
              <textarea name="mensagem" placeholder="Messagem"></textarea>
              <button type="submit" class="site-btn">Enviar</button>
            </div>
          </div>
        </form>
      </div>
      <!-- contact info -->
      <div class="col-md-6 contact-info">
        <div class="section-title left">
          <h2>Fale conosco</h2>
        </div>
        <p>Aqui você pode entrar em contato com a equipe para suas dúvidas, sugestões, reclamações, pedidos e outras informações.</p>
      </div>
      
    </div>
  </div>
</div>
<!-- Contact section end-->
