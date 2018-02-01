<?php
session_start();
include_once "header.php";
?>

<p class="obs">Preencha as informações a seguir para entrar em contato com a gente.</p>
<div class="container">
  <form class="cont">
    <h3></h3>
    <div class="form-group row">
      <div class="col-sm-12">
      Nome:  <input type="text" class="form-control" placeholder="Nome" value="" id="nome">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
      Email: <input type="text" class="form-control"placeholder="Email" value="" id="email">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
      Mensagem: <textarea name="mytextarea" class="form-control" id="textarea" placeholder="Digite seu comentário aqui" rows="3"></textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">ENVIAR MENSAGEM</button>
  </form>
</div>

<?php
  include_once "footer.php"
?>
