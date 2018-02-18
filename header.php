<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Geoplan</title>
  <meta charset="UTF-8"/>

  <!-- Icone -->
  <link href="images/favicon.ico" rel="shortcut icon"/>
  
  <!-- Fontes -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster|Oswald:300,400,500,700|Roboto:300,400,700">
  
  <!-- CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/flaticon.css"/>
  <link href="fontawesome/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/geoplan.css">
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head>
<body>

  <!-- Cabecalho -->
  <header>
    <nav class="navbar navbar-expand-lg p-0">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo (2).png" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSite">
          <ul class="navbar-nav">

            <li class="nav-item active">
              <a class="nav-link" href="index.php">Início</a>
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

          <ul id="user-nav" class="navbar-nav collapse navbar-collapse justify-content-end">
            <?php if (!empty($_SESSION["usuario"])) { ?>
              <li class="navbar-item dropdown">
                <a class="nome-user dropdown-toggle" href="#" data-toggle="dropdown">
                  <span></span><img class="img-xs rounded-circle" src="images/user.png" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="perfil.php">Perfil</a>
                  <a href="logout.php">Logout</a>
                </div>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="site-btn btn-3" href="login.php">Entrar</a>
              </li>
              <li class="nav-item">
                <a class="site-btn btn-2" href="cadastro.php">Cadastre-se</a>
              </li>
            <?php } ?>
          </ul>

          <!-- <form class="form-inline">
            <input class="form-control  ml-4 mr-2" type="search" placeholder="Buscar...">
            <button class="btn btn-dark" type="submit" name="button">OK</button>
          </form> -->
<!-- 
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
            </ul> -->
        </div>
      </div>
    </nav>
  </header>

  


