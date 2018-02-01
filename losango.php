<?php
session_start();
include_once "header.php";
$pag = "losango";
include_once "classes/banco.php";

if (!empty($_SESSION["usuario"])) {

if(!empty($_POST)) {
  try{
    $insere_perfil = "insert into salva_pagina (id_usuario, pagina) values (?, ?)";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $pag);
    $query->execute();
    array_push($_SESSION["usuario"]["paginas"], $pag);
  } catch (PDOException $e) {

  }
}
echo var_dump($_SESSION["usuario"]["paginas"]);
if (!in_array($pag, $_SESSION["usuario"]["paginas"])) {
?>
<form method="post" action="losango.php">
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
    <h2> Losango </h2>
    <h3> O que é um Losango?</h3>
    <p> Um losango é um polígono que possui quatro lados congruentes. Sendo assim, o losango é formado por segmentos de reta, chamados de lados do polígono, que se encontram apenas pelas extremidades. Esses segmentos de reta acabam formando uma figura fechada e seus lados não se cruzam em momento algum. Para ser losango, além de possuir todos os lados congruentes, a figura geométrica precisa ter exatamente quatro lados. Isso classifica o losango como quadrilátero.</p>
    <img src="images/losango.jpg" alt="" class="losango1">
    <p>Além disso, os losangos também são paralelogramos, pois, se um quadrilátero possui todos os lados congruentes, os lados opostos são paralelos.</p>
    <h4>Área do losango</h4>
    <p>Para calcular a área do losango é necessário traçar duas diagonais. Dessa forma tem-se 4 triângulos retângulos (com ângulo reto de 90º) iguais. Assim, podemos encontrar a área do losango a partir da área de 4 triângulos retângulos ou 2 retângulos.</p>
    <p>Assim, a fórmula para encontrar a área do losango é representada da seguinte maneira:</p>
    <img src="images/forlosango.jpg" alt="" class="formlosango">
    <p>Sendo A, a área do losango, D1 a diagonal maior e D2 a diagonal maior.</p>
    <img src="images/losango2.jpg" alt="" class="losango1">

        <div class="container">
            <form class="calcular">
              <p class="instrucoes">DIGITE OS VALORES PEDIDOS PARA ENCONTRAR A ÁREA</p>
              <div class="form-group row">
                <div class="col-sm-12">
                  Dagonal Maior: <input type="text" class="form-control" placeholder="diagonal maior" id="diagonalmaior">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  Diagonal Menor: <input type="text" class="form-control"placeholder="tamanho da altura" id="diagonalmenor">
                </div>
              </div>
                  <button type="button" value="Calcular" class="btn btn-primary" onclick="calcularAreaLosango();return true"/>Calcular</button>
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
