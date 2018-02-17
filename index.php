<?php
session_start();
include_once "header.php";
$pag = "index";

include_once "salvar_pagina.php";

?>

    <div class="container">


        <h2> A Geometria Plana </h2>
      <p>A geometria plana ou euclidiana é a parte da matemática que estuda as figuras que não possuem volume. A geometria plana também é chamada de euclidiana, uma vez que seu nome representa uma homenagem ao geômetra Euclides de Alexandria, considerado o “pai da geometria”.
        Curioso notar que o termo geometria é a união das palavras “geo” (terra) e “metria” (medida); assim, a palavra geometria significa a "medida de terra".</p>

      <div class="row mb-5">

        <div class="col-sm-4">
           <div class="card">
             <img src="images/card1.png" class="fluid-img" alt="">
             <div class="card-body">
               <h3>Como surgiu?</h3>
                <p>Os  primeiros  conhecimentos  geométricos  que  o  homem  teve,  a  respeito  da
                geometria  partiram  das  necessidade
                s  em  compreender  melhor  o  meio  onde  vivia.
                Motivo este que talvez justifique a origem da sua palavra, pois o termo “geometria”
                deriva do grego geo = terra + metria = medida que significa medição de terra.</p>
               <br/><a href="historia.php"><button class="btn btn-dark mt-2 btn btn-primary btn-sm" type="submit" name="button">Leia Mais</button></a>

             </div>
           </div>
        </div>

        <div class="col-sm-4">
           <div class="card">
             <img src="images/card2.png" class="fluid-img" alt="">

             <div class="card-body">
               <h3>O que são figuras planas</h3>

               <p>Uma figura plana nada mais é que um plano que possui uma forma específica e para que ela exista é preciso que tenha no mínimo três lados. Todas essas formas geométricas definidas como Figuras Planas possuem fórmulas matemáticas para o cálculo da medida de seus perímetros e de suas superfícies (ou áreas).</p>
               <br/>

              <a href="definicao.php"><button class="btn btn-dark mt-2 btn btn-primary btn-sm" type="submit" name="button">Leia Mais</button></a>

             </div>
           </div>
        </div>

        <div class="col-sm-4">
           <div class="card">
             <img src="images/card3.png" class="fluid-img" alt="">

             <div class="card-body">
               <h3>Perímetro e área</h3>

               <p>o perímetro de uma figura plana representa a soma de todas as medidas de seus lados. Já a área é um conceito matemático que pode ser definida como quantidade de espaço bidimensional, ou seja, de superfície. Cada figura possui uma fórmula diferente para calcular a área.</p>
               <br/><a href="perimetro.php"><button class="btn btn-dark mt-2 btn btn-primary btn-sm" type="submit" name="button">Leia Mais</button></a>

             </div>
           </div>
        </div>

      </div> <!--Row-->
    </div> <!--Container-->

<?php
  include_once "footer.php";
