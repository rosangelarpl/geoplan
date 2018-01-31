<!DOCTYPE html>
<html>
<head>
  <title> Página Inicial </title>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/geoplan.css">
</head>
<body>


  <nav class="navbar" style="background-color: rgba(220,220,220,0.4); margin:0;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Geoplan</a>
      </div>
      <nav class="nav navbar-nav navbar-right">
        <ul>
          <form class="form-inline">
              <li role="presentation">
                <a class="page-scroll" class="dropdown-toggle" data-toggle="dropdown"><img class="userperfil" src= "images/user.png" > <span class="caret"></a>
                <ul class="dropdown-menu">
                  <li><a href="perfil.php">Perfil</a></li>
                  <li><a href="#">Sair</a></li>
                </ul>
              </li>
          </form>
        </ul>
    </nav>
    </div>
  </nav>

  <article id="central">

    <header>
      <img src="images/header.png" alt="Minha Figura" class="head">
    </header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav menu">
          <li>
            <a class="page-scroll" href="index.php">Inicial</a>
          </li>
          <li role="presentation">
            <a class="page-scroll" class="dropdown-toggle" data-toggle="dropdown">As Figuras <span class="caret"></a>
            <ul class="dropdown-menu">
              <li><a href="triagulo.php">Triângulo</a></li>
              <li><a href="circulo.php">Círculo</a></li>
              <li><a href="losango.php">Losango</a></li>
              <li><a href="paralelogramo.php">Paralelogramo</a></li>
              <li><a href="retangulo.php">Retângulo</a></li>
              <li><a href="trapezio.php">Trapézio</a></li>
            </ul>

          </li>
          <li>
            <a class="page-scroll" href="sobre.php">Sobre</a>
          </li>
          <li>
            <a class="page-scroll" href="cadastro.php">Cadastre-se</a>
          </li>

          <li>
            <a class="page-scroll" href="contato.php">Contato</a>
          </li>
          <?php if (!empty($_SESSION["usuario"])) { ?>
          <li>
            <a class="page-scroll" href="logout.php">SAIR</a>
          </li>
        <?php } else {  ?>
          <li>
            <a class="page-scroll" href="login.php">Entrar</a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
    </nav>
