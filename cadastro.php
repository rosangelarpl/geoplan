<?php
session_start();
include_once "classes/banco.php";

if (!empty($_POST)) {
  try{
    $insere_usuario = "insert into usuario (nome, email, senha) values(?,?,?)";
    $query = Banco::instanciar()->prepare($insere_usuario);
    $query->bindValue(1, $_POST["nome"]);
    $query->bindValue(2, $_POST["email"]);
    $query->bindValue(3, $_POST["senha"]);
    $query->execute();
    Banco::instanciar()->commit();
    $usuario_id = Banco::instanciar()->lastInsertId();
    $insere_perfil = "insert into perfil (id_usuario, perfil) values (?, ?)";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $usuario_id);
    $query->bindValue(2, "comum");
    $query->execute();
    Banco::instanciar()->commit();
    $resultado = "Usuário cadastrado com sucesso!";
  } catch(PDOException $e) {
    if($e->getCode() == "23000") {
      $resultado = "Erro no cadastro. Usuário existente.";
    }
    else $resultado = "Erro no cadastro, verifique as informações e tente novamente.";
  }

  echo $resultado;
}

include_once "header.php";

?>
        <p class="obs">Preencha as informações a seguir para fazer cadastro no site.</p>
        <div class="container">
          <form method="post" action="cadastro.php">
            <h3>Realizar Cadastro</h3>
            <div class="form-group row">
              <div class="col-sm-12">
              Nome:  <input type="text" class="form-control" placeholder="Nome" value="" id="nome" name="nome">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
              Email: <input type="text" class="form-control" placeholder="Email" value="" id="email" name="email">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
              Senha: <input type="password" class="form-control" placeholder="Senha" name="senha">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">CADASTRAR</button>
          </form>
        </div>
      </div> <!-- Div sem fechar nada nessa pagina-->
    </div> <!-- Div sem fechar nada nessa pagina-->
<?php
    include_once "footer.php";
