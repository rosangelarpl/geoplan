<?php
include_once "classes/Banco.php";

if (!empty($_SESSION["usuario"])) {

	if(!empty($_POST["comentario"])) {

    try{
    $insere_comentario = "insert into comentario (id_usuario, pagina, texto) values (?, ?, ?)";
    $query = Banco::instanciar()->prepare($insere_comentario);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $parametros[0]);
    $query->bindValue(3, $_POST["comentario"]);
    $query->execute();

    $insere_acao = "insert into historico (id_usuario, acao, id_acao) values (?, 'comentario', LAST_INSERT_ID())";
    $query = Banco::instanciar()->prepare($insere_acao);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->execute();
    } catch (PDOException $e) {
 
    }


  }
}

// VERIFICA SE TA LOGADO E PEGA OS COMENTARIOS DA PAGINA
if (!empty($_SESSION["usuario"])) { 
$encontra_comentarios = "select c.*,u.nome from comentario as c join usuario as u on u.id=c.id_usuario where pagina = '$parametros[0]' ORDER BY id ASC";
$query = Banco::instanciar()->prepare($encontra_comentarios);
$query->execute();
$comentarios = $query->fetchall(Banco::FETCH_ASSOC);
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

?> 

<!-- comentarios section -->
<div class="comentarios-section spad">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-7 mb-5">
        
        <!-- COMENTÁRIOS -->
        <div class="comments">
          <h2>Comentários (<?=count($comentarios);?>)</h2>
          <ul class="comment-list">

            <?php foreach($comentarios as $comentario) : ?>

            <li>
              <div class="avatar">
                <img src="images/avatar/01.jpg" alt="">
              </div>
              <div class="commetn-text">
                <h3><?=$comentario['nome'];?> |  <?=strftime('%d de %B de %Y', strtotime($comentario["feito_em"]))?> </h3>
                <p><?=$comentario['texto'];?></p>
              </div>
            </li>
            
            <?php endforeach ?> <!-- FIM DO LAÇO -->


            
          </ul>
        </div>

        <!-- FORMULÁRIO DE COMENTÁRIO -->
        <div class="row">
          <div class="col-md-9 comment-from">
            <h2>Faça um comentário</h2>
            <form class="form-class" method="post" action="<?=$parametro[0];?>">
              <div class="row">
                <div class="col-sm-12">
                  <textarea name="comentario" placeholder="Messagem"></textarea>
                  <button  type="submit" class="site-btn">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

     
    </div>
  </div>
</div>
<!-- comentarios section end-->

<?php } ?>

