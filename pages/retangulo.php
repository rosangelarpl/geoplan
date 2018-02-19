<?php
$pag = "retangulo";
include_once "section_header.php";

?>

<!-- Article section -->
<div class="spad">
  <div class="container box">

    <?php include_once "salvar_pagina.php"; ?>

    
    <div class="section-title dark">
      <h2>Retângulo</h2>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <h2 class="post-title">O que é um Retangulo?</h2>
        <p> O retângulo é uma figura geométrica plana formada por quatro lados (quadrilátero). Dentre os lados, dois deles são menores, o que os difere dos quadrados.
        Assim o retângulo é um paralelogramo formado por ângulos internos retos (90°) e congruentes (mesma medida).</p>
      <img src="images/retangulo.jpg" alt="" class="retangulo1">
     
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
    </div>

  </div>
</div>
<!-- article section end -->


<?php
  include_once "comentario.php";
