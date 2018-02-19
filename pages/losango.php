<?php
$pag = "losango";
include_once "section_header.php";

?>

<!-- Article section -->
<div class="spad">
  <div class="container box">

    <?php include_once "salvar_pagina.php"; ?>

    <div class="section-title dark">
      <h2>Losango</h2>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <h2 class="post-title"> O que é um Losango?</h2>
        <p> Um losango é um polígono que possui quatro lados congruentes. Sendo assim, o losango é formado por segmentos de reta, chamados de lados do polígono, que se encontram apenas pelas extremidades. Esses segmentos de reta acabam formando uma figura fechada e seus lados não se cruzam em momento algum. Para ser losango, além de possuir todos os lados congruentes, a figura geométrica precisa ter exatamente quatro lados. Isso classifica o losango como quadrilátero.</p>

        <img src="images/losango.jpg" alt="" class="losango1">

        <p>Além disso, os losangos também são paralelogramos, pois, se um quadrilátero possui todos os lados congruentes, os lados opostos são paralelos.</p>
        
        <h2 class="post-title pt-5">Área do losango</h2>

        <p>Para calcular a área do losango é necessário traçar duas diagonais. Dessa forma tem-se 4 triângulos retângulos (com ângulo reto de 90º) iguais. Assim, podemos encontrar a área do losango a partir da área de 4 triângulos retângulos ou 2 retângulos.</p>
        <p>Assim, a fórmula para encontrar a área do losango é representada da seguinte maneira:</p>

        <img src="images/forlosango.jpg" alt="" class="formlosango">

        <p>Sendo A, a área do losango, D1 a diagonal maior e D2 a diagonal maior.</p>

        <img src="images/losango2.jpg" alt="" class="losango1">

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
    </div>

  </div>
</div>
<!-- article section end -->

   

<?php
include_once "comentario.php";
