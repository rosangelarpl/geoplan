<?php
$section_title = 'As Figuras';
$section_subtitle = 'Retângulo';
include_once "section_header.php";
include_once "section_nav.php";
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

              <h2 class="post-title text-center pt-5">calcular Área do Retângulo</h2>

          <div id="login" class="login-page">
            <div class="form">
              <form class="login-form">
                <input type="text" placeholder="Tamanho da base" id="base">
                <input type="text" placeholder="Tamanho da altura" id="altura">
                <button type="button" value="Calcular" class="site-btn btn-2 mb-3" onclick="calcularAreaParalelogramo();return true"/>Calcular</button>
                <input type="text"  id="area" name="area" placeholder="Resultado">
              </form>
            </div>
          </div>
     



      </div>
    </div>

  </div>
</div>
<!-- article section end -->


<?php
  include_once "comentario.php";
