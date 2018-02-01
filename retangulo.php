<?php
session_start();
include_once "header.php";
$pag = "retangulo";
include_once "classes/banco.php";

if (!empty($_SESSION["usuario"])) {

if(!empty($_POST)) {
  try{
    $insere_perfil = "insert into salva_pagina (id_usuario, pagina) values (?, ?)";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $pag);
    $query->execute();
  } catch (PDOException $e) {

  }
}
$encontra_paginas = "select pagina from salva_pagina where id_usuario = ? and pagina = ?";
$query = Banco::instanciar()->prepare($encontra_paginas);
$query->bindValue(1, $_SESSION["usuario"]["id"]);
$query->bindValue(2, $pag);
$query->execute();
$pagina = $query->fetch(Banco::FETCH_ASSOC);
if ($pagina["pagina"] !== $pag) {
?>
<form method="post" action="retangulo.php">
  <input type="hidden" value="-" name="-"/>
  <button type="submit" class="btn btn-primary btn-custom pull-right" id="salva">
  <span class="glyphicon glyphicon-star img-circle btn-icon"></span>
  Salvar Página</button>
</form>
<?php } else { ?>
  <a href="#" class="btn btn-secondary active btn-custom pull-right" id="salva">
  <span class="glyphicon glyphicon-heart img-circle btn-icon"></span>
  Página Salva</a>
<?php } ?>
<?php } ?>
    <h2> Retangulo </h2>
    <h3> O que é um Retangulo?</h3>
    <p> O retângulo é uma figura geométrica plana formada por quatro lados (quadrilátero). Dentre os lados, dois deles são menores, o que os difere dos quadrados.
      Assim o retângulo é um paralelogramo formado por ângulos internos retos (90°) e congruentes (mesma medida).</p>
    <img src="images/retangulo.jpg" alt="" class="retangulo1">
    <div class="container">
        <form class="calcular">
          <p class="instrucoes">DIGITE OS VALORES PEDIDOS PARA ENCONTRAR A ÁREA</p>
          <div class="form-group row">
            <div class="col-sm-12">
              Base: <input type="text" class="form-control" placeholder="tamanho da base" id="base">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              Altura: <input type="text" class="form-control"placeholder="tamanho da altura" id="altura">
            </div>
          </div>
              <button type="button" value="Calcular" class="btn btn-primary" onclick="calcularAreaParalelogramo();return true"/>Calcular</button>
          <div class="form-group row">
            <div class="col-sm-12">
              Área:<input type="text" class="form-control" id="area" name="area">
            </div>
          </div>
        </form>
    </div>

<?php
  include_once "comentario.php";
  include_once "footer.php";
