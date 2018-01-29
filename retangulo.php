<?php
session_start();
include_once "header.php";
?>
    <h2> Retangulo </h2>
    <h3> O que é um Retangulo?</h3>
    <p> O retângulo é uma figura geométrica plana formada por quatro lados (quadrilátero). Dentre os lados, dois deles são menores, o que os difere dos quadrados.
      Assim o retângulo é um paralelogramo formado por ângulos internos retos (90°) e congruentes (mesma medida).</p>
    <img src="images/retangulo.jpg" alt="" class="retangulo1">
    <div class="container">
        <form>
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
      <h5>Material Retirado de:</h5>
      <p>SILVA, Luiz Paulo Moreira. "O que é triângulo?"; Brasil Escola. Disponível em http://brasilescola.uol.com.br/o-que-e/matematica/o-que-e-triangulo.htm. Acesso em 11 de novembro de 2017. </p>
<?php
  include_once "comentario.php";
  include_once "footer.php";
