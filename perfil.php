<?php
session_start();
include_once "header.php";
?>

<h2 class="h2perfil"> Seu Perfil</h2>
<h3>Dados Pessoais:</h3>
  <div class="divperfil">
    <img class="iconperfil" src="images/user.png" alt="">
      <form class="perfil">
        <div class="form-group row">
          <div class="col-sm-12">
            Nome: <input style="border:0;" type="text" class="form-control" placeholder="" id="nomeperfil">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            Email: <input style="border:0;" type="email" class="form-control"placeholder="" id="emailperfil">
          </div>
        </div>

      </form>
  </div>

   <hr class="hrperfil"/>
  <section class="secaoperfil">
   <h3>Páginas Salvas:</h3>
   <div class="sectionsalva">
     <p>Aqui fica a primeira página salva</p>
     <p>Aqui fica a segunda página salva</p>
     <p>...</p>
     <p>...</p>
   </div>
   <hr class="hrperfil"/>
   <h3>Seus Comentários:</h3>
   <div class="sectioncomentario">
     <p>Aqui fica o primeiro comentário</p>
     <p>Aqui fica o segundo comentário</p>
     <p>...</p>
     <p>...</p>
   </div>
 </section>










<?php
  include_once "footer.php"
?>
