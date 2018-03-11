<?php
$section_title = 'As Figuras';
$section_subtitle = 'Trapézio';
include_once "section_header.php";
include_once "section_nav.php";
?>

<!-- Article section -->
<div class="spad">
  <div class="container box">

    <?php include_once "salvar_pagina.php"; ?>


    <div class="section-title dark">
      <h2>Trapézio</h2>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <h2 class="post-title">O que é um Trapézio?</h2>
        <p> A área de um polígono convexo é o espaço preenchido por sua superfície. Todas as vezes que obtivermos o cálculo de área de determinada região, sua unidade de medida estará elevada ao quadrado (km², cm², m² etc.).</p>
        <p>O trapézio é um quadrilátero, haja vista que possui quatro lados. A soma dos seus ângulos internos e externos é igual a 360°. Todo trapézio possui um par de lados paralelos. Observe a figura a seguir:</p>
        
        <div class="text-center">
          <img src="images/trapezio.jpg" alt="" class="trapezio1">  
        </div>
        
        <p>Para calcularmos a área de um trapézio, devemos saber as medidas referentes à base maior (b), base menor (a) e altura (h). Veja:</p>

        <h2 class="post-title text-center pt-5">calcular Área do Trapézio</h2>

        <div id="login" class="login-page">
          <div class="form">
            <form class="login-form">        
                <input type="text" placeholder="Lado maior" id="ladomaior">
                <input type="text"  placeholder="Lado menor" id="ladomenor"> 
                <input type="text"  placeholder="Altura" id="altura">
                <button type="button" value="Calcular" class="site-btn btn-2 mb-3" onclick="calcularAreaTrapezio();return true"/>Calcular</button>
                <input type="text" id="area" name="area" placeholder="Resultado">
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
