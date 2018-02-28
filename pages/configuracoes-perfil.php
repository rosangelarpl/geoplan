<?php
include_once "classes/Banco.php";
include_once "pages/mostra-alerta.php";


if (!empty($_POST)) {
  try{
    // Cadastrar usuário novo
    $altera_usuario = "update usuario set nome = ?, local = ?, biografia = ? where id = ?";
    $query = Banco::instanciar()->prepare($altera_usuario);
    $query->bindValue(1, $_POST["nome"]);
    $query->bindValue(2, utf8_decode($_POST["local"]));
    $query->bindValue(3, utf8_decode($_POST["biografia"]));
    $query->bindValue(4, $_SESSION[usuario][id]);
    $query->execute();

    try{
      $encontra_usuario = "select * from usuario where id = ?";
      $query = Banco::instanciar()->prepare($encontra_usuario);
      $query->bindValue(1, $_SESSION[usuario][id]);
      $query->execute();
      $usuario = $query->fetch(Banco::FETCH_ASSOC);
      $_SESSION["usuario"] = $usuario;
      header( "location:configuracoes-perfil");
    } catch(PDOException $e) {
      $_SESSION['danger'] = "<strong>Algo deu errado</strong>. Tente novamente.";
    }

    $_SESSION["success"] = "Informações atualizadas com sucesso.";


  } catch(PDOException $e) {
      $_SESSION['danger'] = "<strong>Algo deu errado</strong>. Tente novamente.";
  }
}

?>

<div class="spad">
  <div class="container">

    <?php 
      mostraAlerta("success");
      mostraAlerta("danger"); 
    ?>

    <div class="row">
      <div class="col-md-8">
        <div class="box">
            <h2 class="post-title">PERFIL</h2>
            <form method="post" action="configuracoes-perfil" class="mt60 pl-4 pr-4">
              <div class="form-group row">
                <label for="input-nome" class="text-right col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-9">
                  <input name="nome" type="text" class="form-control" id="input-nome" placeholder="Nome" value="<?php echo utf8_encode($_SESSION[usuario][nome]); ?>" title="Por favor, preencha esse campo." x-moz-errormessage="Por favor, preencha esse campo." required>
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="input-localizacao" class="text-right col-sm-3 col-form-label">Localização</label>
                <div class="col-sm-9">
                  <input name="local" type="text" class="form-control" id="input-localizacao" placeholder="Local" value="<?php 
                  if($_SESSION[usuario][local] !== NULL){
                    echo utf8_encode($_SESSION[usuario][local]);
                  }?>">
                </div>
              </div>

              <div class="form-group row">
                <label class="text-right col-sm-3 col-form-label">Biografia</label>
                <div class="col-sm-9">
                  <textarea name="biografia" class="form-control" maxlength="140"  placeholder="Texto" aria-label="With textarea"><?php 
                      if($_SESSION[usuario][biografia] !== NULL){
                        echo utf8_encode($_SESSION[usuario][biografia]);
                      }
                    ?></textarea>
                  <small class="form-text text-muted">
                   No máximo 140 caracteres.
                  </small>
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