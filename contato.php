<?php
session_start();
include_once "header.php";
?>

<!-- Contact section -->
<div class="contact-section spad">
  <div class="overlay"></div>
  <div class="container">

    <div class="row">
      <!-- contact form -->
      <div class="col-md-6">
        <form class="form-class" id="con_form" method="post" action="envia-contato.php">
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



<?php
  include_once "footer.php"
?>
