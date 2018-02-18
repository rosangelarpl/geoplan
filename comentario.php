<?php


include_once "classes/banco.php";

if (!empty($_SESSION["usuario"])) {

	if(!empty($_POST["comentario"])) {

    try{
    $insere_comentario = "insert into comentario (id_usuario, pagina, texto) values (?, ?, ?)";
    $query = Banco::instanciar()->prepare($insere_comentario);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $pag);
    $query->bindValue(3, $_POST["comentario"]);
    $query->execute();
    } catch (PDOException $e) {
 
    }
  }
}


if (!empty($_SESSION["usuario"])) { 
$encontra_comentarios = "select c.*,u.nome from comentario as c join usuario as u on u.id=c.id_usuario where pagina = '$pag' ORDER BY id ASC";
$query = Banco::instanciar()->prepare($encontra_comentarios);
$query->execute();
$comentarios = $query->fetchall(Banco::FETCH_ASSOC);

?> <!-- VERIFICA SE TA LOGADO E PEGA OS COMENTARIOS DA PAGINA -->

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
                <h3><?=$comentario['nome'];?> | 03 nov, 2017 </h3>
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
            <form class="form-class" method="post" action="<?=$pag?>.php">
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

      <!-- LATERAL area -->
      <div class="col-md-4 col-sm-5 sidebar">
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Add</h2>
          <div class="add">
            <a href=""><img src="images/add.jpg" alt=""></a>
          </div>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Categories</h2>
          <ul>
            <li><a href="#">Vestibulum maximus</a></li>
            <li><a href="#">Nisi eu lobortis pharetra</a></li>
            <li><a href="#">Orci quam accumsan </a></li>
            <li><a href="#">Auguen pharetra massa</a></li>
            <li><a href="#">Tellus ut nulla</a></li>
            <li><a href="#">Etiam egestas viverra </a></li>
          </ul>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Quote</h2>
          <div class="quote">
            <span class="quotation">‘​‌‘​‌</span>
            <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies vestibulum.</p>
          </div>
        </div>
      </div>
      <!-- LATERAL end -->
    </div>
  </div>
</div>
<!-- comentarios section end-->

<?php } ?>

