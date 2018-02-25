<?php
include_once "classes/Banco.php";

$tipo_box = 'submit';
$type = 'submit';
$content = '';
$button_content = '<button type="submit" class="btn float-right">Verificar</button>';


$encontra_exercicios = "select e.*,f.feito from exercicio as e join exercicios_feitos as f on e.id=f.id_exercicio where assunto = ? and feito != 1";
$query = Banco::instanciar()->prepare($encontra_exercicios);
$query->bindValue(1, 'triangulo');
$query->execute();
$exercicios = $query->fetchall(Banco::FETCH_ASSOC);
$exercicio = array();
foreach ($exercicios as $var) :
  $exercicio[$var["id"]] = $var;
endforeach;

echo var_dump($exercicio);
echo $exercicio[1]["pergunta"];
echo $exercicio[1]["id"];

$resposta = $_POST["resposta"];
$correta = $exercicio[1]["resposta"];

if ($resposta == $correta){
  $tipo_box = 'correto';
  $type = 'button';
  $content = '<i class="fas fa-check"></i>';
  $button_content = '<a class="site-btn float-right" href="'. PATH .'/'.$exercicio[1]["id"] .'">Continuar</a>';
} elseif (!empty($resposta)) {
  $tipo_box = 'errado';
  $type = 'button';
  $content = '<i class="fas fa-times"></i>';
  $button_content = '<a class="site-btn float-right" href="'. PATH .'/'.$exercicio[1]["id"] .'">Continuar</a>';
}


if(!empty($exercicio)){


?> 



<div class="container spad">
  <div class="exercicios-container">
    <form class="form-objetiva" method="post" action="exercicios">
      <div class="box-exercicio pb-5">
        <div class="progress mb-5">
          <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        
          <h3 class="post-title"><?=$exercicio[1]["pergunta"]?></h3>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios1" value="1">
            <label class="form-check-label" for="exampleRadios1">
              <?=$exercicio[1]["opcao1"]?>
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="2">
            <label class="form-check-label" for="exampleRadios2">
             <?=$exercicio[1]["opcao2"]?>
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="3">
            <label class="form-check-label" for="exampleRadios2">
             <?=$exercicio[1]["opcao3"]?>
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="4">
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

        