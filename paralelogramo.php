<?php
session_start();
include_once "header.php";
$pag = "paralelogramo";
include_once "salvar_pagina.php";
include_once "section_header.php";

?>

<!-- Article section -->
<div class="spad">
  <div class="container box">
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
  include_once "footer.php";
