<?php
include_once "classes/Banco.php";


if (!empty($_POST)) {
  try{
    
    if ($_SESSION[usuario][senha] == $_POST["senha_atual"]) {
      if($_POST["senha_nova"] == $_POST["senha_nova_confirmar"]){
        $altera_usuario = "update usuario set senha = ? where id = ?";
        $query = Banco::instanciar()->prepare($altera_usuario);
        $query->bindValue(1, $_POST["senha_nova"]);
        $query->bindValue(2, $_SESSION[usuario][id]);
        $query->execute();
        header( "location:configuracoes-senha" );
      }

    } else echo "Senha não confere. Verifique as informações e tente novamente";
  } catch(PDOException $e) {
    echo "Algo deu errado. Verifique as informações e tente novamente.";
  }
}


?>

<div class="spad">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="box">
            <h2 class="post-title">SENHA</h2>
            <form method="post" action="configuracoes-senha" class="mt60 pl-4 pr-4">
          
              <div class="form-group row">
                <label for="inputPassword3" class="text-right col-sm-3 col-form-label">Senha atual</label>
                <div class="col-sm-9">
                  <input name="senha_atual" type="password" class="form-control" id="inputPassword3" placeholder="Senha atual">
                 
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="text-right col-sm-3 col-form-label">Nova senha</label>
                <div class="col-sm-9">
                  <input name="senha_nova" type="password" class="form-control" id="inputPassword3" placeholder="Nova senha">
                   <small id="passwordHelpBlock" class="form-text text-muted">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                  </small>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="text-right col-sm-3 col-form-label">Confirmar senha</label>
                <div class="col-sm-9">
                  <input name="senha_nova_confirmar" type="password" class="form-control" id="inputPassword3" placeholder="Confirmar senha">
                
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary mt-2 float-right">Salvar alterações</button>
                </div>
              </div>
            </form>
        </div>
      </div>

      <div class="col-md-4">
          <?php include_once "configuracoes_nav.php" ?>
      </div>
    </div>

  </div>
</div>