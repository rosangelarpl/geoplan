<?php
include_once "classes/banco.php";

if (!empty($_POST)) {
  try{
    // Cadastrar usuário novo
    $insere_usuario = "insert into usuario (nome, email, senha) values(?,?,?)";
    $query = Banco::instanciar()->prepare($insere_usuario);
    $query->bindValue(1, $_POST["nome"]);
    $query->bindValue(2, $_POST["email"]);
    $query->bindValue(3, $_POST["senha"]);
    $query->execute();
    $usuario_id = Banco::instanciar()->lastInsertId();
    $insere_perfil = "insert into perfil (id_usuario, perfil) values (?, ?)";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $usuario_id);
    $query->bindValue(2, "comum");
    $query->execute();
    // Logar o novo usuário no sistema
    $encontra_usuario = "select * from usuario where email = ?";
    $query = Banco::instanciar()->prepare($encontra_usuario);
    $query->bindValue(1, $_POST["email"]);
    $query->execute();
    $usuario = $query->fetch(Banco::FETCH_ASSOC);
    $_SESSION["usuario"] = $usuario;
    $_SESSION["usuario"]["paginas"] = array();
    header( "location:perfil.php" );
  } catch(PDOException $e) {
    if($e->getCode() == "23000") {
      $resultado = "Erro no cadastro. Usuário existente.";
    }
    else $resultado = "Erro no cadastro, verifique as informações e tente novamente.";
  }

  echo $resultado;
}

?>
  <div class="container">
    <p class="obs">Preencha as informações a seguir para fazer cadastro no site.</p>
    <div class="row justify-content-center ml-4 mb-5">
      <div class="col-sm-10 col-md-8 col-lg-6">
        <h4>Realizar Cadastro</h4>

        <form class="cadastro">


          <div class="form-row ml-4">
            <div class="form-group col-sm-10">

              <label for="inputNome">Nome</label>
              <input type="text" class="form-control" placeholder="Nome" value="" id="nome" name="nome">
            </div>
            <div class="form-group col-sm-10">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" placeholder="Email" value="" id="email" name="email">
            </div>
            <div class="form-group col-sm-10">
              <label for="inputEmail">Senha</label>
              <input type="password" class="form-control" placeholder="Senha" name="senha">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">CADASTRAR</button>
        </form>


      </div>

    </div>

  </div> <!--Container-->

</div> <!-- Div sem fechar nada nessa pagina-->
</div> <!-- Div sem fechar nada nessa pagina-->

