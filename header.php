<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html>
<head>
  <title> Página Inicial </title>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/geoplan.css">
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand h1 nb-0" href="index.php">Geoplan</a>

      <div class="collapse navbar-collapse" id="navbarSite">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicial</a>
          </li>
          <li class="navbar-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">As Figuras</a>
            <div class="dropdown-menu">
              <a href="triagulo.php">Triângulo</a>
              <a href="circulo.php">Círculo</a>
              <a href="losango.php">Losango</a>
              <a href="paralelogramo.php">Paralelogramo</a>
              <a href="retangulo.php">Retângulo</a>
              <a href="trapezio.php">Trapézio</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sobre.php">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contato.php">Contato</a>
          </li>
        </ul>

        <form class="form-inline">
          <input class="form-control  ml-4 mr-2" type="search" placeholder="Buscar...">
          <button class="btn btn-dark" type="submit" name="button">OK</button>
          <ul id="entrar">
            <?php if (!empty($_SESSION["usuario"])) { ?>

            <li role="presentation">
              <a class="page-scroll" class="dropdown-toggle" data-toggle="dropdown"><img class="userperfil" src= "images/user.png" > <span class="caret"></a>
              <ul class="dropdown-menu">
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="logout.php">Sair</a></li>
              </ul>
            </li>
            <?php } else { ?>
            <li>
              <a href="cadastro.php">Cadastre-se</a>
            </li>
            <li>
              <a href="login.php">Entrar</a>
            </li>
            <?php } ?>
          </ul>
        </form>
      </div>
    </div>
  </nav>
  <div id="carouselSite" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
      <li data-target="#carouselSite" data-slide-to="1"></li>
      <li data-target="#carouselSite" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slide1.png" alt="">
      </div>
      <div class="carousel-item">
        <img src="images/slide2.png" alt="">
      </div>
      <div class="carousel-item">
        <img src="images/slide3.png" alt="">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </div>


  <article id="central">
