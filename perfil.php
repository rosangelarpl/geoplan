<?php
session_start();
include_once "header.php";
?>

<h2 class="h2perfil"> Seu Perfil</h2>
<h3>Dados Pessoais:</h3>
<div class="">
  <img class="userperfil" src="images/user.png" alt="">
  <div class="">
    <form class="perfil">
      <div class="form-group row">
        <div class="col-sm-12">
          Nome: <input style="border:0;" type="text" class="form-control" placeholder="" id="diagonalmaior">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          Email: <input style="border:0;" type="text" class="form-control"placeholder="" id="diagonalmenor">
        </div>
      </div>

    </form>
  </div>
</div>

<h3>Páginas Salvas:</h3>

  <ul>
    <li>Página 1</li>
    <li>Página 2</li>
  </ul>
<h3>Seus Comentários:</h3>
  <ul>
    <li>Comentário 1</li>
    <li>Comentário 2</li>
  </ul>









<?php
  include_once "footer.php"
?>
