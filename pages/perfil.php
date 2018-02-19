<?php
if (!empty($_SESSION["usuario"])) {

include_once "classes/banco.php";
?>

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
