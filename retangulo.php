<?php
session_start();
include_once "header.php";
?>
    <h2> Retangulo </h2>
    <h3> O que é um Retangulo?</h3>
    <p> O retângulo é uma figura geométrica plana formada por quatro lados (quadrilátero). Dentre os lados, dois deles são menores, o que os difere dos quadrados.
      Assim o retângulo é um paralelogramo formado por ângulos internos retos (90°) e congruentes (mesma medida).</p>
    <img src="images/retangulo.jpg" alt="" class="retangulo1">
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
            <img src="images/arearet.png" alt="" class="arearetangulo">
              <div class="form-group row">
                <label for="altura" class="col-sm-2 col-form-label">Altura:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"placeholder="tamanho da altura" id="altura">
                  <input type="button" value="Calcular" onclick="calcularAreaRetangulo();return true"/>
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
