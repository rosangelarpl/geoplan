<?php
include_once "classes/Banco.php";


$tipo_box = 'submit';
$type = 'submit';
$content = '';
$button_content = '<button type="submit" class="btn float-right">Verificar</button>';


$encontra_exercicios = "select e.*,f.feito, f.id_usuario from exercicio as e join exercicios_feitos as f on e.id=f.id_exercicio where assunto = ? and feito != 1 and id_usuario = ? limit 2";
$query = Banco::instanciar()->prepare($encontra_exercicios);
$query->bindValue(1, $parametros[1]);
$query->bindValue(2, $_SESSION[usuario][id]);
$query->execute();
$exercicios = $query->fetchall(Banco::FETCH_ASSOC);
$exercicio = array();
$i = 1;
foreach ($exercicios as $var) :
  $exercicio[$i] = $var;
  $i++;
endforeach;


$encontra_progresso = "select * from progresso where assunto = ? and id_usuario = ? limit 2";
$query = Banco::instanciar()->prepare($encontra_progresso);
$query->bindValue(1, $exercicio[1]["assunto"]);
$query->bindValue(2, $_SESSION[usuario][id]);
$query->execute();
$progressos = $query->fetchall(Banco::FETCH_ASSOC);
$progresso = array();
$i = 1;
foreach ($progressos as $var) :
  $progresso[$i] = $var;
  $i++;
endforeach;
  


echo var_dump($exercicio);
echo $exercicio[1]["pergunta"];
echo $exercicio[1]["id_usuario"];
echo $progresso[1]["progresso"];

$resposta = $_POST["resposta"];
$correta = $exercicio[1]["resposta"];

if ($resposta == $correta){
  if(!empty($exercicio[2])){
  $proxExercicio = $exercicio[2]["id"];
  } else {
    $proxExercicio = 'concluido';
  }

  try{
    $altera_feito = "update exercicios_feitos set feito = ? where id_exercicio = ? and id_usuario = ?";
    $query = Banco::instanciar()->prepare($altera_feito);
    $query->bindValue(1, 1);
    $query->bindValue(2, $exercicio[1]["id"]);
    $query->bindValue(3, $_SESSION[usuario][id]);
    $query->execute();    
  }catch(PDOException $e){
    echo $e;
  }

  try{
    $soma_progresso = $progresso[1]["progresso"] + 10;
    $altera_progresso = "update progresso set progresso = ? where assunto = ? and id_usuario = ?";
    $query = Banco::instanciar()->prepare($altera_progresso);
    $query->bindValue(1, $soma_progresso);
    $query->bindValue(2, $exercicio[1]["assunto"]);
    $query->bindValue(3, $_SESSION[usuario][id]);
    $query->execute();    
  }catch(PDOException $e){
    echo $e;
  }


  $tipo_box = 'correto';
  $type = 'button';
  $content = '<i class="fas fa-check"></i>';
  $button_content = '<a class="site-btn float-right" href="'. PATH .'exercicios/'.$parametros[1].'/'.$proxExercicio .'">Continuar</a>';
} elseif (!empty($resposta)) {

  if(!empty($exercicio[1])){
  $proxExercicio = $exercicio[1]["id"];
  } else {
    $proxExercicio = 'concluido';
  }

  $tipo_box = 'errado';
  $type = 'button';
  $content = '<i class="fas fa-times"></i>';
  $button_content = '<a class="site-btn float-right" href="'. PATH .'exercicios/'.$parametros[1].'/'.$proxExercicio .'">Continuar</a>';
}



if(!empty($exercicio)){


?> 



<div class="container spad">
  <div class="exercicios-container">
    <form class="form-objetiva" method="post" action="<?=PATH?>exercicios/<?=$parametros[1]?>/<?=$exercicio[1]["id"]?>">
      <div class="box-exercicio pb-5">
        <div class="progress mb-5">

          <div class="progress-bar" style="width: <?=$progresso[1]["progresso"]?>%;" role="progressbar" aria-valuenow="<?=$progresso[1]["progresso"]?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        
          <h3 class="post-title"><?=$exercicio[1]["pergunta"]?></h3>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios1" value="1" <?php 
if($resposta==1){echo 'checked';}?>>
            <label class="form-check-label" for="exampleRadios1">
              <?=$exercicio[1]["opcao1"]?>
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="2" <?php 
if($resposta==2){echo 'checked';}?>>
            <label class="form-check-label" for="exampleRadios2">
             <?=$exercicio[1]["opcao2"]?>
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="3" <?php 
if($resposta==3){echo 'checked';}?>>
            <label class="form-check-label" for="exampleRadios2">
             <?=$exercicio[1]["opcao3"]?>
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="4" <?php 
if($resposta==4){echo 'checked';}?>>
            <label class="form-check-label" for="exampleRadios2">
              <?=$exercicio[1]["opcao4"]?>
            </label>
          </div>

          

      </div>

      <div class="box-exercicio-<?=$tipo_box?>">
        <div class="<?=$tipo_box?> float-left">
          <?=$content?>
        </div>
        <div class="botoes">
          <?=$button_content?>
        </div>
      </div>
    </form>
<!--<div class="box-exercicio-correto">
      <div class="correto float-left">
        <i class="fas fa-check"></i>
      </div>
      <div class="botoes">

         <button type="submit" class="btn float-right">Continuar</button>
      </div>
    </div>


    <div class="box-exercicio-errado">
      <div class="errado float-left">
        <i class="fas fa-times"></i>
      </div>
      <div class="botoes">
         <button type="submit" class="btn">Pular</button>
         <button type="" class="btn float-right">Continuar</button>
      </div>
    </div>
-->

  </div>
</div>

<?php 
} else {
  echo "completou";
} 
 ?>

        