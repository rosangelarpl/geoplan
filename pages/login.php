<?php
  session_start();
  include_once "classes/Banco.php";

if (!empty($_POST)) {
  try{
    $encontra_usuario = "select * from usuario where (usuario = ? OR email = ?)";
    $query = Banco::instanciar()->prepare($encontra_usuario);
    $query->bindValue(1, $_POST["login"]);
    $query->bindValue(2, $_POST["login"]);
    $query->execute();
    $usuario = $query->fetch(Banco::FETCH_ASSOC);
    if (!$usuario) {
      echo "Usuário não encontrado. Verifique as informações e tente novamente";
    } elseif ($usuario["senha"] == $_POST["senha"]) {
      $_SESSION["usuario"] = $usuario;
      header( 'location:perfil/'.$_SESSION[usuario][usuario] );
    } else echo "Senha não confere. Verifique as informações e tente novamente";
  } catch(PDOException $e) {
    echo "Usuário ou senha não confere. Verifique as informações e tente novamente.";
  }
}

?>

<div id="login" class="login-page spad">
  <div class="form">
    <form method="post" class="login-form" action="<?=PATH?>login">
      <input type="text" name="login" placeholder="email ou usuário"/>
      <input type="password" name="senha" placeholder="senha"/>
      <button type="submit" class="site-btn btn-2">ENTRAR</button>
      <p class="message">Não é cadastrado? <a href="<?=PATH?>cadastro">Crie uma conta</a></p>
    </form>
  </div>
</div>


