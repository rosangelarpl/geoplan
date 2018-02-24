<?php
include_once "classes/Banco.php";

if (!empty($_POST)) {
  try{
    // Cadastrar usuário novo
    $altera_usuario = "update usuario set usuario = ?, email = ? where id = ?";
    $query = Banco::instanciar()->prepare($altera_usuario);
    $query->bindValue(1, $_POST["usuario"]);
    $query->bindValue(2, $_POST["email"]);
    $query->bindValue(3, $_SESSION[usuario][id]);
    $query->execute();

    try{
      $encontra_usuario = "select * from usuario where id = ?";
      $query = Banco::instanciar()->prepare($encontra_usuario);
      $query->bindValue(1, $_SESSION[usuario][id]);
      $query->execute();
      $usuario = $query->fetch(Banco::FETCH_ASSOC);
      $_SESSION["usuario"] = $usuario;
      header( "location:configuracoes-conta");
    } catch(PDOException $e) {
      echo "Verifique as informações e tente novamente.";
    }

  } catch(PDOException $e) {
    if($e->getCode() == "23000") {
      $resultado = "Erro no cadastro. Usuário existente.";
    }
    else echo $e;
  }
}

?>


<div class="spad">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="box">
            <h2 class="post-title">CONFIGURAÇÕES DE CONTA</h2>
            <form class="mt60 pl-4 pr-4" method="post" action="configuracoes-conta">
              <div class="form-group row">
                <label for="input-user" class="text-right col-sm-3 col-form-label">Usuário</label>
                <div class="col-sm-9">
                  <input name="usuario" type="text" class="form-control" id="input-user" placeholder="Usuário" value="<?php echo utf8_encode($_SESSION[usuario][usuario]); ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="text-right col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo utf8_encode($_SESSION[usuario][email]); ?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-3 text-right"><label class="col-form-label">Foto</label></div>
                <div class="col-sm-9">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                  <label class="custom-file-label" for="customFileLang">Foto do perfil</label>
                  <small id="passwordHelpBlock" class="form-text text-muted">
                   Tamanho máximo = 1 MB
                  </small>
                  </div>
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