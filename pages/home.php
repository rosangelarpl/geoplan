<?php
$pag = "index";
?>

<!-- Slide -->
<div id="carouselSite" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
    <li data-target="#carouselSite" data-slide-to="1"></li>
    <li data-target="#carouselSite" data-slide-to="2"></li>
    <li data-target="#carouselSite" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slide.jpg" class="fluid-img" alt="">
    </div>
    <div class="carousel-item">
      <img src="images/slide1.png" class="fluid-img" alt="">
    </div>
    <div class="carousel-item">
      <img src="images/slide2.png" class="fluid-img" alt="">
    </div>
    <div class="carousel-item">
      <img src="images/slide3.png" class="fluid-img" alt="">
    </div>
  </div>

  <div class="carousel-nav">
      <a class="carousel-control-prev nav-prev" href="#carouselSite" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Anterior</span>
      </a>
      
      <a class="carousel-control-next nav-next" href="#carouselSite" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Próximo</span>
      </a>
  </div>
</div>
<!-- Fim slide -->


<!-- About section -->
<div class="about-section spad">
  <div class="overlay"></div>
  
  <!-- About contant -->
  <div class="about-contant">
    <div class="container">
      <div class="section-title">
        <h2>A <span>GEOMETRIA</span> PLANA</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>A geometria plana ou euclidiana é a parte da matemática que estuda as figuras que não possuem volume. A geometria plana também é chamada de euclidiana, uma vez que seu nome representa uma homenagem ao geômetra Euclides de Alexandria, considerado o “pai da geometria”. Curioso notar que o termo geometria é a união das palavras “geo” (terra) e “metria” (medida); assim, a palavra geometria significa a "medida de terra".</p>
        </div>
      </div>
    </div>
  </div>

  <!-- card section -->
  <div class="card-section mt60">
    <div class="container">
      <div class="row">
        <!-- single card -->
        <div class="col-md-4 col-sm-6">
          <div class="lab-card">
            <div class="icon">
              <i class="flaticon-023-flask"></i>
            </div>
            <h2>Como surgiu?</h2>
            <p>Os primeiros conhecimentos geométricos que o homem teve, a respeito da geometria partiram das necessidades em compreender melhor o meio onde vivia. Motivo este que talvez justifique a origem da sua palavra, pois o termo “geometria” deriva do grego geo = terra + metria = medida que significa medição de terra.</p>
            <div class="text-center mt60">
              <a href="<?=PATH?>historia" class="site-btn btn-1">LEIA MAIS</a>
            </div>   
          </div>
        </div>
        <!-- single card -->
        <div class="col-md-4 col-sm-6">
          <div class="lab-card">
            <div class="icon">
              <i class="flaticon-037-idea"></i>
            </div>
            <h2>O que são figuras planas</h2>
            <p>Uma figura plana nada mais é que um plano que possui uma forma específica e para que ela exista é preciso que tenha no mínimo três lados. Todas essas formas geométricas definidas como Figuras Planas possuem fórmulas matemáticas para o cálculo da medida de seus perímetros e de suas superfícies (ou áreas).</p>
            <div class="text-center mt60">
              <a href="<?=PATH?>definicao" class="site-btn btn-1">LEIA MAIS</a>
            </div>  
          </div>
        </div>
        <!-- single card -->
        <div class="col-md-4 col-sm-12">
          <div class="lab-card">
            <div class="icon">
              <i class="flaticon-011-compass"></i>
            </div>
            <h2>Perímetro e área</h2>
            <p>O perímetro de uma figura plana representa a soma de todas as medidas de seus lados. Já a área é um conceito matemático que pode ser definida como quantidade de espaço bidimensional, ou seja, de superfície. Cada figura possui uma fórmula diferente para calcular a área.<br><br></p>
            <div class="text-center mt60">
              <a href="<?=PATH?>perimetro" class="site-btn btn-1">LEIA MAIS</a>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- card section end-->
</div>
<!-- About section end -->
