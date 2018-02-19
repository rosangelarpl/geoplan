<?php
$pag = "trapezio";
include_once "section_header.php";
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
        
        <img src="images/trapezio.jpg" alt="" class="trapezio1">
        
        <p>Para calcularmos a área de um trapézio, devemos saber as medidas referentes à base maior (b), base menor (a) e altura (h). Veja:</p>

        <h2 class="post-title pt-5">Fórmula da Área do Trapézio</h2>

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
    </div>

  </div>
</div>
<!-- article section end -->


<?php
  include_once "comentario.php";
