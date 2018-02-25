<?php 

$resposta = 0;
$resposta = $_POST["resposta"];
$tentativas++;

if ($resposta == $correta){
  $type = "button";
  $class = "btn btn-next";
  $content = 'Next <i class="fa fa-angle-right">';
} else {
  $type = "submit";
  $class = "btn";
  $content = 'Submit';
}



?>




<div class="container spad">
  <div class="exercicios-container">
    <form class="form-objetiva" method="post" action="exercicios">
      <div class="box-exercicio pb-5">
        <div class="progress mb-5">
          <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
     
          <h3 class="post-title">1. What is the output of the below c code?</h3>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios1" value="1">
            <label class="form-check-label" for="exampleRadios1">
              Default radio
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="2">
            <label class="form-check-label" for="exampleRadios2">
              Second default radio
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="3">
            <label class="form-check-label" for="exampleRadios2">
              Second default radio
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="resposta" id="exampleRadios2" value="4">
            <label class="form-check-label" for="exampleRadios2">
              Second default radio
            </label>
          </div>

          
      
      </div>

      <div class="box-exercicio-submit">
       
        <div class="botoes">
          <button type="submit" class="btn float-right">Continuar</button>
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
         <button type="submit" class="btn float-right">Continuar</button>
      </div>
    </div>

-->
  </div>
</div>

        