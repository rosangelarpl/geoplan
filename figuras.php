<?php
session_start();
include_once "header.php";
?>
    <h2> Figuras Planas </h2>
    <p>Uma figura plana nada mais é que um plano que possui uma forma específica e para que ela exista é preciso que tenha no mínimo três lados. Todas essas formas geométricas definidas como Figuras Planas possuem fórmulas matemáticas  para o cálculo da medida de seus perímetros e de suas superfícies (ou áreas).</p>
    <h3>1. Perímetro – Definição e cálculo</h3>
    <p> o perímetro de uma figura plana representa a soma de todas as medidas de seus lados. Observe a figura abaixo. Ela representa uma figura plana de quatro lados (portanto é um quadrilátero) denominado trapézio.</p>
    <img src="images/img_02_aula1_fmt.jpeg" alt="trapézio comum" class="trapezio1"/>
    <p>Nela observa-se que as medidas de seus lados valem 15 cm, 5 cm, 9 cm e 5 cm. Assim, calcula-se seu perímetro somando 15 + 5 + 9 + 5 = 34 cm.</p>
    <p class="obs"> Observe que o perímetro é uma grandeza cuja unidade de medida é a de comprimento e, portanto, pode ser medido em metros ou em seus múltiplos e submúltiplos.</p>
    <h3>2. Definição de Área</h3>
    <p>Área é um conceito matemático que pode ser definida como quantidade de espaço bidimensional, ou seja, de superfície. Existem várias unidades de medida de área, sendo a mais utilizada o metro quadrado (m²) e os seus múltiplos e sub-múltiplos. Cada figura possui uma fórmula diferente para calcular a área.</p>
    <p>Clique nas figuras a seguir para obter mais informações sobre cada uma delas.</p>
    <div class="container">
      <div class="col-md-2">
        <ul id="figuras">
          <li>
            <a href="triagulo.php">Triângulo</a>
          </li>
          <li>
            <a href="circulo.php">Círculo</a>
          </li>
          <li>
            <a href="losango.php">Losango</a>
          </li>
          <li>
            <a href="paralelogramo.php">Paralelogramo</a>
          </li>
          <li>
            <a href="retangulo.php">Retângulo</a>
          </li>
          <li>
            <a href="trapezio.php">Trapézio</a>
          </li>
        </ul>
      </div>
    </div>
<?php
  include_once "footer.php";
