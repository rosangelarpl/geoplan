<?php
session_start();
include_once "header.php";
$pag = "trapezio";
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
<form method="post" action="trapezio.php">
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
    <h2> Trapézio </h2>
    <h3> O que é um Trapézio?</h3>
    <p> A área de um polígono convexo é o espaço preenchido por sua superfície. Todas as vezes que obtivermos o cálculo de área de determinada região, sua unidade de medida estará elevada ao quadrado (km², cm², m² etc.).</p>
    <p>O trapézio é um quadrilátero, haja vista que possui quatro lados. A soma dos seus ângulos internos e externos é igual a 360°. Todo trapézio possui um par de lados paralelos. Observe a figura a seguir:</p>
    <img src="images/trapezio.jpg" alt="" class="trapezio1">
    <p>Para calcularmos a área de um trapézio, devemos saber as medidas referentes à base maior (b), base menor (a) e altura (h). Veja:</p>
    <h4>Fórmula da Área do Trapézio</h4>

    <div class="container">
        <form class="calcular">
          <p class="instrucoes">DIGITE OS VALORES PEDIDOS PARA ENCONTRAR A ÁREA</p>
          <div class="form-group row">
            <div class="col-sm-12">
              Lado Maior: <input type="text" class="form-control" placeholder="lado maior" id="ladomaior">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              Lado Menor: <input type="text" class="form-control" placeholder="lado menor" id="ladomenor">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
            Altura:<input type="text" class="form-control" placeholder="Altura" id="altura">
            </div>
          </div>
              <button type="button" value="Calcular" class="btn btn-primary" onclick="calcularAreaTrapezio();return true"/>Calcular</button>
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
