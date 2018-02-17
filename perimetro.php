<?php
session_start();
include_once "header.php";
$pag = "paralelogramo";
include_once "salvar_pagina.php";

?>

  <div class="container">
    <div class=" col-12">
      <h2>Perímetro e Área</h2>
      <h3>Perímetro</h3>
      <p> o perímetro de uma figura plana representa a soma de todas as medidas de seus lados. Observe a figura ao lado. Ela representa uma figura plana de quatro lados (portanto é um quadrilátero) denominado trapézio.</p>
      <img src="images/img_02_aula1_fmt.jpeg" alt="trapézio comum" class="trapezio1"/>
      <p>Nela observa-se que as medidas de seus lados valem 15 cm, 5 cm, 9 cm e 5 cm. Assim, calcula-se seu perímetro somando 15 + 5 + 9 + 5 = 34 cm.</p>
      <p class="obs"> Observe que o perímetro é uma grandeza cuja unidade de medida é a de comprimento e, portanto, pode ser medido em metros ou em seus múltiplos e submúltiplos.</p>
      <h3>Área</h3>
      <p>Área é um conceito matemático que pode ser definida como quantidade de espaço bidimensional, ou seja, de superfície. Existem várias unidades de medida de área, sendo a mais utilizada o metro quadrado (m²) e os seus múltiplos e sub-múltiplos. Cada figura possui uma fórmula diferente para calcular a área.</p>
      <p>Clique nas figuras a seguir para obter mais informações sobre cada uma delas.</p>

      

    </div>

  </div>


<?php
  include_once "footer.php";
