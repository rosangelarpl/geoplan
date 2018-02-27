<?php

include_once "classes/Banco.php";

if (!empty($_POST["opcao1"])) {
  try{
    // Cadastrar novo exercício
    $insere_exercicio = "insert into exercicio (tipo, id_assunto, pergunta, slug_img, opcao1, opcao2, opcao3, opcao4, resposta) values (?,?,?,?,?,?,?,?,?)";
    $query = Banco::instanciar()->prepare($insere_exercicio);
    $query->bindValue(1, $_POST["tipo"]);
    $query->bindValue(2, $_POST["id_assunto"]);
    $query->bindValue(3, $_POST["pergunta"]);
    $query->bindValue(4, $_POST["slug_img"]);
    $query->bindValue(5, $_POST["opcao1"]);
    $query->bindValue(6, $_POST["opcao2"]);
    $query->bindValue(7, $_POST["opcao3"]);
    $query->bindValue(8, $_POST["opcao4"]);
    $query->bindValue(9, $_POST["resposta"]);  
    $query->execute();

    $exercicio_id = Banco::instanciar()->lastInsertId();
    
    //Pega todos os usuarios e registra o exercício nas contas para poder analisar progresso individualmente
    $encontra_usuarios = "select * from usuario";
    $query = Banco::instanciar()->prepare($encontra_usuarios);
    $query->execute();
    $usuarios = $query->fetchall(Banco::FETCH_ASSOC);
    foreach ($usuarios as $usuario) :
      $insere_feitos = "insert into exercicios_feitos (id_exercicio, id_usuario) values (?, ?)";
      $query = Banco::instanciar()->prepare($insere_feitos);
      $query->bindValue(1, $exercicio_id);
      $query->bindValue(2, $usuario["id"]);
      $query->execute();
    endforeach;

  }catch(PDOException $e) {
    echo $e;
  }
}


if(!empty($_POST["remover_exercicio"])){
  try {
    $remove_exercicio = "delete from exercicio where id = ?";
    $query = Banco::instanciar()->prepare($remove_exercicio);
    $query->bindValue(1, $_POST["remover_exercicio"]);
    $query->execute();

    $remove_feito = "delete from exercicios_feitos where id_exercicio = ?";
    $query = Banco::instanciar()->prepare($remove_feito);
    $query->bindValue(1, $_POST["remover_exercicio"]);
    $query->execute();
    
  } catch (PDOException $e) {
    echo $e;
  }

}

?>

<div class="section-form-exercicio spad">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="box">
            <h2 class="post-title">CADASTRAR EXERCÍCIO</h2>

            <form method="post" name="inserir" action="form-exercicio-objetivo" class="mt60 pl-4 pr-4">

              <div class="form-group row">
                <label class="text-right col-sm-3 col-form-label" for="exampleFormControlSelect1">Tipo</label>
                <div class="col-sm-9">
                  <select name="tipo" class="form-control" id="exampleFormControlSelect1">
                    <option value="objetiva">Objetiva</option>

                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="text-right col-sm-3 col-form-label" for="exampleFormControlSelect1">Assunto</label>
                <div class="col-sm-9">
                  <select name="id_assunto" class="form-control" id="exampleFormControlSelect1">
                  <?php 
                  $encontra_assuntos = "select * from assunto";
                  $query = Banco::instanciar()->prepare($encontra_assuntos);
                  $query->execute();
                  $assuntos = $query->fetchall(Banco::FETCH_ASSOC);
                  foreach ($assuntos as $assunto) :
                  ?> 
                    <option value="<?=$assunto["id"]?>"><?=utf8_encode($assunto["titulo"])?></option>
                  <?php
                  endforeach;
                  ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="text-right col-sm-3 col-form-label">Pergunta</label>
                <div class="col-sm-9">
                  <textarea name="pergunta" class="form-control" maxlength="255" rows="4"  placeholder="Pergunta" aria-label="With textarea" required="Por favor, escreva a pergunta."></textarea>
                  <small class="form-text text-muted">
                   No máximo 255 caracteres.
                  </small>
                </div>
              </div>

              <div class="form-group row">
                <label for="input-imagem" class="text-right col-sm-3 col-form-label">Slug imagem</label>
                <div class="col-sm-9">
                  <input name="slug_img" type="text" class="form-control" id="input-imagem" placeholder="default.jpg">
                  <small class="form-text text-muted">
                    Nome da imagem com sua extensão na pasta images/exercicios/.
                  </small>
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="input-opcao1" class="text-right col-sm-3 col-form-label">a)</label>
                <div class="col-sm-9">
                  <input name="opcao1" type="text" class="form-control" id="input-opcao1" placeholder="opcao a" required>
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="input-opcao2" class="text-right col-sm-3 col-form-label">b)</label>
                <div class="col-sm-9">
                  <input name="opcao2" type="text" class="form-control" id="input-opcao2" placeholder="opcao b" required>
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="input-opcao3" class="text-right col-sm-3 col-form-label">c)</label>
                <div class="col-sm-9">
                  <input name="opcao3" type="text" class="form-control" id="input-opcao3" placeholder="opcao c" required>
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="input-opcao4" class="text-right col-sm-3 col-form-label">d)</label>
                <div class="col-sm-9">
                  <input name="opcao4" type="text" class="form-control" id="input-opcao4" placeholder="opcao d" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="text-right col-sm-3 col-form-label" for="exampleFormControlSelect1">Resposta correta</label>
                <div class="col-sm-9">
                  <select name="resposta" class="form-control" id="exampleFormControlSelect1">
                    <option value="1">a</option>
                    <option value="2">b</option>
                    <option value="3">c</option>
                    <option value="4">d</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary mt-2 float-right">Cadastrar exercício</button>
                </div>
              </div>
            </form>

        </div>
      </div>

      <div class="col-md-4">
        <div class="box">
          <h2 class="post-title mb-4"><i class="largura50 fa fa-tasks"></i>LISTA EXERCÍCIOS</h2>
          <div id="accordion">


            <?php 
            $encontra_assuntos = "select * from assunto";
            $query = Banco::instanciar()->prepare($encontra_assuntos);
            $query->execute();
            $assuntos = $query->fetchall(Banco::FETCH_ASSOC);
            foreach ($assuntos as $assunto) :
            ?> 
            <div class="card">
              <div class="card-header" id="heading<?=$assunto["id"]?>">
                <h3 class="post-subtitle mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$assunto["id"]?>" aria-expanded="true" aria-controls="collapse<?=$assunto["id"]?>">
                    <?=utf8_encode($assunto["titulo"])?>
                  </button>
                </h3>
              </div>
              
              <div id="collapse<?=$assunto["id"]?>" class="collapse" aria-labelledby="heading<?=$assunto["id"]?>" data-parent="#accordion">
                <div class="card-body">

                  <table class="table table-hover">




                    <?php
                    $encontra_exercicios = "select * from exercicio where id_assunto = ?";
                    $query = Banco::instanciar()->prepare($encontra_exercicios);
                    $query->bindValue(1, $assunto["id"]);
                    $query->execute();
                    $exercicios = $query->fetchall(Banco::FETCH_ASSOC);
                    $i=1;
                    foreach ($exercicios as $exercicio) :
                    ?>
                    
                    <tr>
                      <td>
                        <?=$i?>
                      </td>
                      <td>
                        <a href="<?=PATH?>exercicios/<?=$assunto["assunto"]?>/<?=$exercicio["id"]?>" class="">
                          <?=$exercicio["pergunta"]?>
                        </a>
                      </td>
                      <td>
                        <form action="form-exercicio-objetivo" method="post">
                          <input type="hidden" name="remover_exercicio" value="<?=$exercicio["id"]?>">
                          <button href="" class="float-right btn btn-link"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                    

                    <?php
                    $i++;
                    endforeach;
                    ?>
                  </table>
                </div>
              </div>
            </div>
            <?php
            endforeach;
            ?>

           </div>
        </div> 
  
      </div>
    </div>

  </div>
</div>

