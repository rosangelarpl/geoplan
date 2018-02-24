<?php
if (!empty($_SESSION["usuario"])) {
include_once "classes/Banco.php";
?>

<div class="section-perfil spad">
  <div class="container">

    
    
    <div class="row">
      <div id="box-perfil" class="col-md-8">
        <div class="box">
          <div class="perfil-avatar text-center mt-5">
              <img class="rounded-circle" src="images/avatar/01.jpg" alt="">
          </div>
          <h2 class="text-center mt-4"><?php echo utf8_encode($_SESSION[usuario][nome]); ?></h2>
          <h3 class="post-subtitle text-center mt-5">
            <?php echo $_SESSION[usuario][usuario];

            if($_SESSION[usuario][local] !== NULL){
            ?>
            <span class="span-subtitle"><i class="fa fa-map-marker-alt"></i><?php echo utf8_encode($_SESSION[usuario][local]); ?></span>
            <?php 
            }
            ?>
          </h3>
          
          <?php if($_SESSION[usuario][biografia] !== NULL){ ?>

          <div class="biografia text-center">
            <p>
              <?php echo utf8_encode($_SESSION[usuario][biografia]); ?>
            </p>
          </div>

          <?php 
          }
          ?>

          <div class="container mt-5">
            <div class="row">
                <div class="timeline-centered">


                  
                  <?php 

                  $encontra_historicos = "select * from historico where id_usuario = ? ORDER BY datetime DESC";
                  $query = Banco::instanciar()->prepare($encontra_historicos);
                  $query->bindValue(1, $_SESSION["usuario"]["id"]);
                  $query->execute();
                  $historicos = $query->fetchall(Banco::FETCH_ASSOC);

                  foreach($historicos as $historico) :

                    if($historico["acao"]=="comentario"){
                      $encontra_acoes = "select * from comentario where id = ?";
                      $query = Banco::instanciar()->prepare($encontra_acoes);
                      $query->bindValue(1, $historico["id_acao"]);
                      $query->execute();
                      $acoes = $query->fetchall(Banco::FETCH_ASSOC);

                      foreach ($acoes as $acao) :  ?>  <!-- LAÇO DE REPETIÇÃO -->

                      <article class="timeline-entry pt-3 pr-3">
                          <div class="timeline-entry-inner">
                           
                              <img  class="timeline-icon" src="images/avatar/01.jpg" alt="">
                              
                              <div class="timeline-label">
                                  <h2><a href="#">Bruno Wagner</a><span> comentou em </span><a href="<?=PATH.$acao['pagina']?>"><?=$acao['pagina']?></a></h2>
                                  <p><?=$acao['texto']?></p>
                                  <p><?=strftime('%d de %B de %Y', strtotime($acao["feito_em"]))?></p>
                              </div>
                          </div>
                      </article>
                 

                  <?php
                        
                      endforeach;
                    } elseif($historico["acao"]=="salvar_pagina"){
                      $encontra_acoes = "select * from salva_pagina where id = ?";
                      $query = Banco::instanciar()->prepare($encontra_acoes);
                      $query->bindValue(1, $historico["id_acao"]);
                      $query->execute();
                      $acoes = $query->fetchall(Banco::FETCH_ASSOC);

                      foreach ($acoes as $acao) :  ?>  <!-- LAÇO DE REPETIÇÃO -->

                      <article class="timeline-entry pt-3 pr-3">
                          <div class="timeline-entry-inner">
                           
                              <img  class="timeline-icon" src="images/avatar/01.jpg" alt="">
                              
                              <div class="timeline-label">
                                  <h2><a href="#">Bruno Wagner</a><span> salvou a página </span><a href="<?=PATH.$acao['pagina']?>"><?=$acao['pagina']?></a></h2>
                                  <p><?=strftime('%d de %B de %Y', strtotime($acao["salva_em"]))?></p>
                                  
                              </div>
                          </div>
                      </article>
                 

                  <?php
                        
                      endforeach;
                    } 
                  endforeach;

                  if(!empty($historicos)){ 

                  ?>
                  <article class="timeline-entry begin">
                      <div class="timeline-entry-inner">
                          <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                              +
                          </div>
                      </div>
                  </article>
                  <?php
                  }
                  ?>
              </div>

            </div>
          </div>

        </div>
      </div>

      <div class="col-md-4">
        <div class="box">
          <h2 class="post-title"><i class="fa fa-star"></i> PÁGINAS SALVAS</h2>

            

          <ul class="nav flex-column mt-4">
            <?php
            $encontra_paginas = "select * from salva_pagina where id_usuario = ?";
            $query = Banco::instanciar()->prepare($encontra_paginas);
            $query->bindValue(1, $_SESSION["usuario"]["id"]);
            $query->execute();
            $paginas = $query->fetchall(Banco::FETCH_ASSOC);
            foreach ($paginas as $pagina) :
            ?>

            <li class="nav-item">
              <a class="nav-link" href="<?=PATH?><?=$pagina['pagina']?>">
                <?=$pagina['pagina']?>
                <span style="font-size: 12px; color:#ccc"> Salva em <?=date('d/m/Y', strtotime($pagina["salva_em"]))?></span>
              </a>
            </li>

            <?php endforeach  ?> <!-- FIM DO LAÇO -->

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
