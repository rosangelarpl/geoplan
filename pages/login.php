<?php
  session_start();
  include_once "classes/banco.php";

if (!empty($_POST)) {
  try{
    $encontra_usuario = "select * from usuario where email = ?";
    $query = Banco::instanciar()->prepare($encontra_usuario);
    $query->bindValue(1, $_POST["email"]);
    $query->execute();
    $usuario = $query->fetch(Banco::FETCH_ASSOC);
    if (!$usuario) {
      echo "Usuário não encontrado. Verifique as informações e tente novamente";
    } elseif ($usuario["senha"] == $_POST["senha"]) {
      $_SESSION["usuario"] = $usuario;
      header( "location:perfil" );
    } else echo "Senha não confere. Verifique as informações e tente novamente";
  } catch(PDOException $e) {
    echo "Usuário ou senha não confere. Verifique as informações e tente novamente.";
  }
}

?>
        <div class="container">
          <form method="post" action="login.php" class="login">
            <h3>Login</h3>
            <div class="form-group row">
              <div class="col-sm-12">
                Email: <input type="email" class="form-control" placeholder="Email" value="" name="email">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                Senha: <input type="password" class="form-control" placeholder="Senha" value="" name="senha">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">ENTRAR</button>
            <a href="cadastro.php" class="redcadastro"> Ou cadastre-se </a>
          </form>
        </div>

