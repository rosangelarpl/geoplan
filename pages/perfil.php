<?php

include_once "classes/Banco.php";

$encontra_usuario = "select * from usuario where usuario = ?";
$query = Banco::instanciar()->prepare($encontra_usuario);
$query->bindValue(1, $parametros[1]);
$query->execute();
$usuarios = $query->fetchall(Banco::FETCH_ASSOC);
$usuario = array();
$i = 1;
foreach ($usuarios as $var) :
  $usuario[$i] = $var;
  $i++;
endforeach;

//echo var_dump($usuario);
//echo $usuario[1]["slug_foto"];

?>

<div class="section-perfil spad">
  <div class="container">

    
    
    <div class="row">
      <div id="box-perfil" class="col-md-8">
        <div class="box">
          <div class="perfil-avatar text-center mt-5">
              <img class="rounded-circle" src="<?=PATH?>images/fotos/<?=$usuario[1]["slug_foto"]?>" alt="">
          </div>
          <h2 class="text-center mt-4"><?php echo utf8_encode($usuario[1]["nome"]); ?></h2>
          <h3 class="post-subtitle text-center mt-5">
            <?php echo $usuario[1]["usuario"];

            if($usuario[1]["local"] !== NULL){
            ?>
            <span class="span-subtitle"><i class="fa fa-map-marker-alt"></i><?php echo utf8_encode($usuario[1]["local"] ); ?></span>
            <?php 
            }
            ?>
          </h3>
          
          <?php if($usuario[1]["biografia"] !== NULL){ ?>

          <div class="biografia text-center">
            <p>
              <?php echo utf8_encode($usuario[1]["biografia"]); ?>
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
                  $query->bindValue(1, $usuario[1]["id"]);
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
                           
                              <img  class="timeline-icon" src="<?=PATH?>images/fotos/<?=$usuario[1]["slug_foto"]?>" alt="">
                              
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
                           
                              <img  class="timeline-icon" src="<?=PATH?>images/fotos/<?=$usuario[1]["slug_foto"]?>" alt="">
                              
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
          <h2 class="post-title mb-4"><i class="largura50 fa fa-tasks"></i>LIÇÕES FEITAS</h2>

            

        
            <?php

              $encontra_progresso = "select p.*,a.titulo from progresso as p join assunto as a on a.id=p.id_assunto where id_usuario = ?";
              $query = Banco::instanciar()->prepare($encontra_progresso);
              $query->bindValue(1, $usuario[1]["id"]);
              $query->execute();
              $progressos = $query->fetchall(Banco::FETCH_ASSOC);
              foreach ($progressos as $progresso) :

            ?>

            <h3 class="post-subtitle mb-1"><?=utf8_encode($progresso["titulo"])?></h3>

            <div class="progress mb-3">
              <div class="progress-bar" style="width: <?=$progresso["progresso"]*100?>%;" role="progressbar" aria-valuenow="<?=$progresso["progresso"]?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            
            <?php
    
              endforeach;

            ?>



           

    
        </div> 
        <div class="box mt-4">
          <h2 class="post-title"><i class="largura50 fa fa-star"></i>PÁGINAS SALVAS</h2>

            

          <ul class="nav flex-column mt-4">
            <?php
            $encontra_paginas = "select * from salva_pagina where id_usuario = ?";
            $query = Banco::instanciar()->prepare($encontra_paginas);
            $query->bindValue(1, $usuario[1]["id"]);
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
     $query->bindValue(1, $usuario[1]["id"]);
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
      $query->bindValue(1, $usuario[1]["id"]);
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
