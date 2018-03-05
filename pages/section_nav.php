<?php 
require_once "classes/Banco.php";


$encontra_assuntos = "select * from assunto";
$query = Banco::instanciar()->prepare($encontra_assuntos);
$query->execute();
$assuntos = $query->fetchall(Banco::FETCH_ASSOC);
foreach ($assuntos as $assunto) :
  if($assunto["assunto"] == $parametros[0]){
    $id_assunto = $assunto["id"];
  }
endforeach;

//echo '-------'.$id_assunto.'------------';


$encontra_exercicios = "select e.*,f.feito,a.assunto,f.id_usuario from exercicio as e join exercicios_feitos as f on e.id=f.id_exercicio join assunto as a on a.id=e.id_assunto where id_assunto = ? and feito != 1 and id_usuario = ? limit 2";
$query = Banco::instanciar()->prepare($encontra_exercicios);
$query->bindValue(1, $id_assunto);
$query->bindValue(2, $_SESSION[usuario][id]);
$query->execute();
$exercicios = $query->fetchall(Banco::FETCH_ASSOC);
$exercicio = array();
$i = 1;
foreach ($exercicios as $var) :
  $exercicio[$i] = $var;
  $i++;
endforeach;

//echo var_dump($exercicio);
  

if(!empty($exercicio)){
  $proxExercicio = $exercicio[1]["id"];
} else {
  $proxExercicio = 'concluido';
}

?>

<nav id="section-nav" class="navbar navbar-expand-lg">
  <div class="container collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="#">Explorar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="exercicios/<?=$parametros[0]?>/<?=$proxExercicio?>">Praticar</a>
      </li>
    </ul>
  </div>
</nav>