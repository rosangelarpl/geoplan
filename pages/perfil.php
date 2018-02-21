<?php
if (!empty($_SESSION["usuario"])) {
include_once "classes/banco.php";
?>

<div class="section-perfil spad">
  <div class="container">

    
    
    <div class="row">
      <div id="box-perfil" class="col-md-8">
        <div class="box">
          <div class="perfil-avatar text-center mt-5">
              <img class="rounded-circle" src="images/avatar/01.jpg" alt="">
          </div>
          <h2 class="text-center mt-4">BRUNO WAGNER</h2>
          <h3 class="post-subtitle text-center mt-5">usuario <span class="span-subtitle"><i class="fa fa-map-marker-alt"></i>Ceará-Mirim</span></h3>
          <div class="biografia text-center">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue.
            </p>
          </div>

          <div class="container mt-5">
            <div class="row">
                <div class="timeline-centered">
                  <article class="timeline-entry pr-3">
                      <div class="timeline-entry-inner">
                       
                          <img  class="timeline-icon" src="images/avatar/01.jpg" alt="">
                          
                          <div class="timeline-label">
                              <h2><a href="#">Art Ramadani</a> <span>posted a status update</span></h2>
                              <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>
                          </div>
                      </div>
                  </article>



                  <article class="timeline-entry begin">
                      <div class="timeline-entry-inner">
                          <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                              +
                          </div>
                      </div>
                  </article>
              </div>

            </div>
          </div>

        </div>
      </div>

      <div class="col-md-4">
        <div class="box">
          <h2 class="post-title"><i class="fa fa-star"></i> FAVORITOS</h2>

            

          <ul class="nav flex-column mt-4">
            <li class="nav-item">
              <a class="nav-link active" href="#">Conta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Perfil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Senha</a>
            </li>
          </ul>
        </div>  
      </div>
    </div>

  </div>
</div>





<h2 class="h2perfil"> Seu Perfil</h2>
<h3>Dados Pessoais:</h3>
  <div class="divperfil">
    <img class="iconperfil" src="images/user.png" alt="">
      <form class="perfil">
        <div class="form-group row">
          <div class="col-sm-12">
            Nome: <input style="border:0;" type="text" class="form-control" placeholder="<?php echo $_SESSION[usuario][nome]; ?>" id="nomeperfil">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            Email: <input style="border:0;" type="email" class="form-control"placeholder="<?php echo $_SESSION[usuario][email]; ?>" id="emailperfil">
          </div>
        </div>

      </form>
  </div>

   <hr class="hrperfil"/>
  <section class="secaoperfil">
   <h3>Páginas Salvas:</h3>
   <div class="sectionsalva">
     <?php
     $encontra_paginas = "select * from salva_pagina where id_usuario = ?";
     $query = Banco::instanciar()->prepare($encontra_paginas);
     $query->bindValue(1, $_SESSION["usuario"]["id"]);
     $query->execute();
     $paginas = $query->fetchall(Banco::FETCH_ASSOC);
     foreach ($paginas as $pagina) {
      echo '<p><a href="'. $pagina["pagina"] .'">Página: '. $pagina["pagina"] .'</a> - Salva em '. date('d/m/Y', strtotime($pagina["salva_em"])). '</p>';
     }
     ?>
   </div>
   <hr class="hrperfil"/>
   <h3>Seus Comentários:</h3>
   <div class="sectioncomentario"> <!-- LISTANDO COMENTARIOS DO USUÁRIO -->
      <?php 
      $encontra_comentarios = "select * from comentario where id_usuario = ? ORDER BY id ASC";
      $query = Banco::instanciar()->prepare($encontra_comentarios);
      $query->bindValue(1, $_SESSION["usuario"]["id"]);
      $query->execute();
      $comentarios = $query->fetchall(Banco::FETCH_ASSOC);
      setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      date_default_timezone_set('America/Sao_Paulo');


      foreach($comentarios as $comentario) : ?>  <!-- LAÇO DE REPETIÇÃO -->

        <p>
          <!-- LINK PARA A PAGINA DO COMENTARIO -->
          Feito na página <a href="<?=$comentario['pagina']?>"><?=$comentario['pagina']?></a> em 
          <!-- DATA DO COMENTARIO -->
          <?=strftime('%d de %B de %Y', strtotime($comentario["feito_em"]))?>:
          <br>
          <!-- $comentario['texto'] É A VARIÁVEL QUE CONTEM O COMENTÁRIO -->
          <?=$comentario['texto']?>
        </p>

      <?php endforeach  ?> <!-- FIM DO LAÇO -->
   </div>
 </section>

<?php
} else {
  header("location:login");
}
