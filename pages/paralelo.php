<?php
$section_title = 'As Figuras';
$section_subtitle = 'Paralelogramo';
include_once "section_header.php";
include_once "section_nav.php";
?>

<!-- Article section -->
<div class="spad">
  <div class="container box">

    <?php include_once "salvar_pagina.php"; ?>

    
    <div class="section-title dark">
      <h2>Paralelogramo</h2>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <h2 class="post-title">O que é um Paralelogramo?</h2>
        <p> O paralelogramo é uma figura plana que possui quatro lados. Ele faz parte dos estudos da geometria plana sendo um quadrilátero cujos lados opostos são paralelos. Em outras palavras, os paralelogramos são polígonos de quatro lados opostos congruentes (que possuem a mesma medida), por exemplo, o quadrado, o losango e o retângulo.</p>

        <h2 class="post-title pt-5">Área do Paralelogramo</h2>
        <p>Para encontrar a área do paralelogramo basta calcular o produto da medida da base pela altura, expressa pela fórmula:</p>
        <p class="formula">A = b.h</p>
        <p>Onde, <br/> A: área
            <br/>b: base
            <br/>h: altura</p>

        <h2 class="post-title text-center pt-5">calcular Área do Paralelogramo</h2>

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
