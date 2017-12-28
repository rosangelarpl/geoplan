<?php
session_start();
include_once "header.php";
?>
    <h2> Paralelogramo </h2>
    <h3> O que é um Paralelogramo?</h3>
    <p> O paralelogramo é uma figura plana que possui quatro lados. Ele faz parte dos estudos da geometria plana sendo um quadrilátero cujos lados opostos são paralelos. Em outras palavras, os paralelogramos são polígonos de quatro lados opostos congruentes (que possuem a mesma medida), por exemplo, o quadrado, o losango e o retângulo.</p>
    <img src="images/paralelogramo.jpg" alt="" class="paralelogramo1">
    <h4>Área do Paralelogramo</h4>
    <p>Para encontrar a área do paralelogramo basta calcular o produto da medida da base pela altura, expressa pela fórmula:</p>
    <p class="formula">A = b.h</p>
    <p>Onde, <br/> A: área
        <br/>b: base
        <br/>h: altura</p>
      <div class="area">
        <div class="container">
          <div class="col-md-10">
            <form>
              <p class="instrucoes">DIGITE OS VALORES PEDIDOS PARA ENCONTRAR A ÁREA</p>
              <div class="form-group row">
                <label for="base" class="col-sm-2 col-form-label">Base:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="tamanho da base" id="base">
                </div>
              </div>
              <img src="images/areapar.png" alt="" class="areaparalelogramo">
              <div class="form-group row">
                <label for="altura" class="col-sm-2 col-form-label">Altura:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"placeholder="tamanho da altura" id="altura">
                  <input type="button" value="Calcular" onclick="calcularAreaParalelogramo();return true"/>
                </div>
              </div>
              <div class="resultado">
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Área</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="area" name="area">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <h5>Material Retirado de:</h5>
      <p>SILVA, Luiz Paulo Moreira. "O que é triângulo?"; Brasil Escola. Disponível em http://brasilescola.uol.com.br/o-que-e/matematica/o-que-e-triangulo.htm. Acesso em 11 de novembro de 2017. </p>
<?php
  include_once "footer.php";
