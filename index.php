<?php
include "header.php";


$paginas_permitidas = array(
  'cadastro',
  'circulo', 
  'contato', 
  'definicao', 
  'figuras', 
  'historia', 
  'home', 
  'login',
  'losango',
  'paralelogramo',
  'perfil',
  'perimetro',
  'retangulo',
  'sobre',
  'trapezio',
  'triangulo',
  'logout',
  'configuracoes-conta',
  'configuracoes-perfil',
  'configuracoes-senha'
); //Quando tu fizer uma página, adiciona o nome dela aqui, sem o .php


// Essa parte pega o URL e testa se a pagina é permitida, se for aí chama o include "pagina tal";
if($url == ''){
  include_once "pages/home.php";

}elseif(in_array($parametros[0], $paginas_permitidas)){
  include_once "pages/".$parametros[0].'.php';

}else{
  include_once "pages/error404.php";
}


include "footer.php";

