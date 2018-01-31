<?php
  session_start();
  include_once "header.php";
?>
    <a href="#" class="btn btn-primary btn-custom pull-right" id="salva">
    <span class="glyphicon glyphicon-star img-circle btn-icon"></span>Salvar Página</a>
    <h2> Triângulos </h2>
    <h3> O que é um Triângulo?</h3>
    <img src="images/triangulo.jpg" alt="Minha Figura" class="triangulo1">
    <p> Triângulos são polígonos formados por três lados. Os polígonos, por sua vez, são figuras geométricas formadas por segmentos de reta que, dois a dois, tocam-se em seus pontos extremos, mas que não se cruzam em qualquer outro ponto. Sendo assim, os triângulos herdam dos polígonos algumas características e propriedades básicas.</p>
    <h3>Elementos de um triangulo</h3>
    <p>Os triângulos possuem os mesmos elementos dos polígonos, com exceção das diagonais. Os outros elementos dos polígonos que os triângulos possuem são:<br/>
      <ul class="figuras">
        <li>Lados: são os segmentos de reta que formam o polígono;</li>
        <li>Vértices: são os pontos de encontro entre os lados;</li>
        <li>Ângulos internos: são os ângulos que podem ser observados entre dois lados adjacentes de um triângulo;</li>
        <li>Ângulos externos: são os ângulos que podem ser observados entre um lado de um triângulo e o prolongamento do lado adjacente a ele.</li>
      </ul>
      <img src="images/triangulo-com-seus-elementos.jpg" alt="k" class="triangulo2">
      <h4>Elementos de um triangulo</h4>
      <p>Os triângulos podem ser classificados a partir de seu número de lados. Obrigatoriamente, um triângulo pertence a uma das classificações a seguir:</p>
      <ul class="figuras">
        <li>Escaleno: triângulo que possui todos os lados com medidas diferentes;</li>
        <li>Isósceles: triângulo que possui dois lados com medidas iguais;</li>
        <li>Equilátero: triângulo que possui três lados com medidas iguais.</li>
      </ul>
      <img src="images/primeira-classificacao-de-triangulos.jpg" alt="k" class="triangulo3">
      <p>Outra classificação possível para os triângulos refere-se às medidas de seus ângulos. Veja:</p>
      <ul class="figuras">
        <li>Acutângulo: Triângulo que possui todos os ângulos com medidas menores que 90°;;</li>
        <li>Retângulo: Triângulo que possui um ângulo com medida igual a 90°;</li>
        <li>Obtusângulo: Triângulo que possui um ângulo com medida superior a 90°.</li>
      </ul>
      <img src="images/segunda-classificacao-de-triangulos.jpg" alt="k" class="triangulo4">
      <h3>Propriedades dos triângulos</h3>
      <p>As propriedades a seguir são válidas para qualquer triângulo, independentemente de sua forma ou tamanho.</p>
      <ul class="figuras">
        <li>A soma das medidas dos ângulos internos de um triângulo sempre será igual a 180°;</li>
        <li>A soma das medidas dos ângulos externos de um triângulo sempre será igual a 360°;</li>
        <li>A medida de um ângulo externo de um triângulo é igual à soma das medidas dos dois ângulos internos não adjacentes a ele;</li>
        <li>A soma das medidas de dois lados de um triângulo é sempre maior que a medida do terceiro lado;</li>
        <li>O maior lado de um triângulo opõe-se ao seu maior ângulo;</li>
        <li>O menor lado de um triângulo opõe-se ao seu menor ângulo.</li>
      </ul>

      <div class="container">
          <form class="calcular">
            <p class="instrucoes">DIGITE OS VALORES PEDIDOS PARA ENCONTRAR A ÁREA</p>
            <div class="form-group row">
              <div class="col-sm-12">
              Base: <input type="text" class="form-control" placeholder="tamanho da base" id="base">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
              Altura:<input type="text" class="form-control" placeholder="tamanho da altura" id="altura">
              </div>
            </div>
                <button type="button" value="Calcular" class="btn btn-primary" onclick="calcularAreaTriangulo();return true"/>Calcular</button>
            <div class="form-group row">
              <div class="col-sm-12">
                Área:<input type="text" class="form-control" id="area" name="area">
              </div>
            </div>
          </form>
      </div>

<?php
include_once "comentario.php";
include_once "footer.php";
