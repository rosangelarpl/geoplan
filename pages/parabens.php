<?php 
include_once "classes/Banco.php";

try {
$encontra_qtdExercicios = "select e.id,e.id_assunto,a.assunto from exercicio as e join assunto as a on a.id=e.id_assunto where assunto = ?";
$query = Banco::instanciar()->prepare($encontra_qtdExercicios);
$query->bindValue(1, $parametros[1]);
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

$encontra_assuntos = "select * from assunto";
$query = Banco::instanciar()->prepare($encontra_assuntos);
$query->execute();
$assuntos = $query->fetchall(Banco::FETCH_ASSOC);
foreach ($assuntos as $assunto) :
  if($assunto["assunto"] == $parametros[1]){
    $id_assunto = $assunto["id"];
  }
endforeach;

echo '-------'.$id_assunto.'------------';  

$altera_progresso = "update progresso set progresso = ? where id_assunto = ? and id_usuario = ?";
$query = Banco::instanciar()->prepare($altera_progresso);
$query->bindValue(1, $progresso);
$query->bindValue(2, $id_assunto);
$query->bindValue(3, $_SESSION[usuario][id]);
$query->execute(); 
  
echo $progresso.'---'.count($qtdFeitos).'----'.count($qtdExercicios).'<br>';


} catch (PDOException $e) {
  echo $e;
}




?>
<section class="spad">
  <div class="container box">
    
    <div class="section-title dark">
        <h1 class="error-title">PARABÉNS</h1>
    </div>
    <div class="row">
      <div class="col-md-12 text-xs-center">

      <div class="text-center  mb-5">
        <img src="<?=PATH?>images/fireworks.png" alt="" class="clearfix">
      </div> 

      <h3 class="text-center post-title">Você resolveu todos os exercícios sobre este assunto!</h3>


      <div class="text-center mt-5 mb-4">
        <a href="" class="site-btn btn-1 "><i class="fa fa-home"></i> Volte ao Início</a>
      </div> 
      </div>
    </div>
  </div>
</section>