<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once "config.php";
//Essa parte é pra deixar a URL amigável, pra pegar e passar os parametros pela URL tbm
$url = (isset($_GET['url'])) ? htmlentities(strip_tags($_GET['url'])) : '';
$parametros = explode('/', $url);
// echo var_dump($parametros);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Geoplan</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

  <!-- Icone -->
  <link href="<?=PATH?>images/favicon.ico" rel="shortcut icon"/>
  
  <!-- Fontes -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster|Oswald:300,400,500,700|Roboto:300,400,500,700">
  
  <!-- CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=PATH?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=PATH?>css/flaticon.css"/>
  <link href="<?=PATH?>fontawesome/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?=PATH?>css/geoplan.css">
  <link rel="stylesheet" href="<?=PATH?>fontawesome/css/font-awesome.min.css">




</head>
<body>

  <!-- Cabecalho -->
  <header>
    <nav class="navbar navbar-expand-lg p-0">
      <div class="container">
        <a class="navbar-brand" href="home">
          <img src="<?=PATH?>images/logo (2).png" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSite">
          <ul class="navbar-nav">

            <li class="nav-item">
              <a class="nav-link <?php if(($parametros[0]=='home')||($parametros[0]=='')){echo 'active';}else{echo '';}?>" href="<?=PATH?>home">Início</a>
            </li>
            <li class="navbar-item dropdown">
              <a class="nav-link dropdown-toggle
              <?php if(($parametros[0]=='triangulo')||($parametros[0]=='circulo')||($parametros[0]=='losango')||($parametros[0]=='paralelo')||($parametros[0]=='retangulo')||($parametros[0]=='trapezio')){echo 'active';$section_title="As Figuras";}else{echo '';}?>" href="#" data-toggle="dropdown" id="navDrop">As Figuras</a>
              <div class="dropdown-menu">
                <a class="" href="<?=PATH?>triangulo">Triângulo</a>
                <a class="" href="<?=PATH?>circulo">Círculo</a>
                <a class="" href="<?=PATH?>losango">Losango</a>
                <a class="" href="<?=PATH?>paralelo">Paralelogramo</a>
                <a class="" href="<?=PATH?>retangulo">Retângulo</a>
                <a class="" href="<?=PATH?>trapezio">Trapézio</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($parametros[0]=='sobre'){echo 'active';$section_title="Sobre";$section_subtitle="Sobre";}else{echo '';}?>" href="<?=PATH?>sobre">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($parametros[0]=='contato'){echo 'active';}else{echo '';}?>" href="<?=PATH?>contato">Contato</a>
            </li>

            <?php if (!empty($_SESSION["usuario"]) && $_SESSION[usuario][id]==6) { ?>
            <li class="navbar-item dropdown">
              <a class="nav-link dropdown-toggle
              <?php if(($parametros[0]=='form-exercicio-objetivo')||($parametros[0]=='form-editar-exercicio-objetivo')){
                      echo 'active';
                    }else{
                      echo '';
                    }?>" href="#" data-toggle="dropdown" id="navDrop">Administrador</a>

              <div class="dropdown-menu">
                <a class="" href="<?=PATH?>form-exercicio-objetivo">Gerenciar exercícios</a>
              </div>
            </li>
            <?php } ?>
          </ul>

          <ul id="user-nav" class="navbar-nav collapse navbar-collapse justify-content-end">
            <?php if (!empty($_SESSION["usuario"])) { ?>
              <img class="img-xs rounded-circle" src="<?=PATH?>images/fotos/<?php echo $_SESSION[usuario][slug_foto];?>" alt="">
              <li class="navbar-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                  <?php echo utf8_encode($_SESSION[usuario][nome]); ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="<?=PATH?>perfil/<?=$_SESSION[usuario][usuario]?>">Seu perfil</a>
                  <a href="<?=PATH?>configuracoes-conta">Configurações</a>
                  <a href="<?=PATH?>logout">Sair</a>
                </div>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="site-btn btn-3" href="<?=PATH?>login">Entrar</a>
              </li>
              <li class="nav-item">
                <a class="site-btn btn-2" href="<?=PATH?>cadastro">Cadastre-se</a>
              </li>
            <?php } ?>
          </ul>



      </div>
    </nav>
  </header>

  


