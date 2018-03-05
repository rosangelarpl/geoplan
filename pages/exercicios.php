<?php
include_once "classes/Banco.php";


$tipo_box = 'submit';
$type = 'submit';
$content = '';
$button_content = '<button type="submit" class="btn btn-primary float-right">Verificar</button>';
$exclamacao = '';


$encontra_exercicios = "select e.*,f.feito,a.assunto,f.id_usuario from exercicio as e join exercicios_feitos as f on e.id=f.id_exercicio join assunto as a on a.id=e.id_assunto where assunto = ? and feito != 1 and id_usuario = ? limit 2";
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


$encontra_qtdExercicios = "select * from exercicio where id_assunto = ?";
$query = Banco::instanciar()->prepare($encontra_qtdExercicios);
$query->bindValue(1, $exercicio[1]["id_assunto"]);
$query->execute();
$qtdExercicios = $query->fetchall(Banco::FETCH_ASSOC);

$encontra_feitos = "select e.*,f.feito,a.assunto,f.id_usuario from exercicio as e join exercicios_feitos as f on e.id=f.id_exercicio join assunto as a on a.id=e.id_assunto where assunto = ? and feito = 1 and id_usuario = ?";
$query = Banco::instanciar()->prepare($encontra_feitos);
$query->bindValue(1, $parametros[1]);
$query->bindValue(2, $_SESSION[usuario][id]);
$query->execute();
$qtdFeitos = $query->fetchall(Banco::FETCH_ASSOC);  

$progresso = count($qtdFeitos)/count($qtdExercicios);
$progresso = number_format($progresso,3);

//echo $progresso;

$altera_progresso = "update progresso set progresso = ? where id_assunto = ? and id_usuario = ?";
$query = Banco::instanciar()->prepare($altera_progresso);
$query->bindValue(1, $progresso);
$query->bindValue(2, $exercicio[1]["id_assunto"]);
$query->bindValue(3, $_SESSION[usuario][id]);
$query->execute();  

//select p.*,a.assunto from progresso as p join assunto as a on a.id=p.id_assunto where id_assunto = ? and id_usuario = ? limit 2

$encontra_progresso = "select * from progresso where id_assunto = ? and id_usuario = ? limit 2";
$query = Banco::instanciar()->prepare($encontra_progresso);
$query->bindValue(1, $exercicio[1]["id_assunto"]);
$query->bindValue(2, $_SESSION[usuario][id]);
$query->execute();
$progressos = $query->fetchall(Banco::FETCH_ASSOC);
$progresso = array();
$i = 1;
foreach ($progressos as $var) :
  $progresso[$i] = $var;
  $i++;
endforeach;
  


//echo var_dump($exercicio);
//echo $exercicio[1]["pergunta"];
//echo $exercicio[1]["id_usuario"];
//echo $progresso[1]["progresso"];

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
  $exclamacao = 'Correto!';
  $tipo_box = 'correto';
  $type = 'button';
  $content = '<i class="fas fa-check"></i>';
  $button_content = '<a class="btn btn-success float-right" href="'. PATH .'exercicios/'.$parametros[1].'/'.$proxExercicio .'">Continuar</a>';
} elseif (!empty($resposta)) {

  if(!empty($exercicio[1])){
  $proxExercicio = $exercicio[1]["id"];
  } else {
    $proxExercicio = 'concluido';
  }

  $exclamacao = 'Errado!';
  $tipo_box = 'errado';
  $type = 'button';
  $content = '<i class="fas fa-times"></i>';
  $button_content = '<button type="submit" class="btn btn-danger float-right">Continuar</button>'; //<a class="site-btn float-right" href="'. PATH .'exercicios/'.$parametros[1].'/'.$proxExercicio .'">Continuar</a>';
}



if(!empty($exercicio)){


?> 



<div class="container spad">
  <div class="exercicios-container">
    <form class="form-objetiva" method="post" action="<?=PATH?>exercicios/<?=$parametros[1]?>/<?=$exercicio[1]["id"]?>">
      <div class="box-exercicio pb-5">
        
        <div class="progress mb-5">
          <div class="progress-bar" style="width: <?=(number_format($progresso[1]["progresso"],2)*100)?>%;" role="progressbar" aria-valuenow="<?=$progresso[1]["progresso"]?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>


        
          <h3 class="post-title"><?=$exercicio[1]["pergunta"]?></h3>

          <div class="mb-4">
            <img src="<?=PATH?>/images/exercicios/<?=$exercicio[1]["slug_img"]?>" alt="">
          </div>
          
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

        <div class="float-left ml-4">
          <h3 class="title-box-exercicio"><?=$exclamacao?></h3>
        </div>

        <div class="botoes">
          <?=$button_content?>
        </div>
      </div>
    </form>
<!--

<div class="box-exercicio-correto">
      <div class="correto float-left">
        <i class="fas fa-check"></i>
      </div>

      <div class="float-left ml-4">
        <h3 class="title-box-exercicio">Correto!</h3>
      </div>

      <div class="botoes">

         <button type="submit" class="btn btn-success float-right">Continuar</button>
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

        