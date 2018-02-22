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
    header( "location:".PATH."perfil" );
  } catch(PDOException $e) {
    if($e->getCode() == "23000") {
      $resultado = "Erro no cadastro. Usuário existente.";
    }
    else $resultado = "Erro no cadastro, verifique as informações e tente novamente.";
  }

  echo $resultado;
}

?>


<div id="login" class="login-page spad">
  <div class="form">
    <form method="post" class="login-form" action="<?=PATH?>cadastro">
      <input type="text" name="nome" placeholder="nome"/>
      <input type="email" name="email" placeholder="email"/>
      <input type="password" name="senha" placeholder="senha"/>
      <button type="submit" class="site-btn btn-2">CADASTRAR</button>
      <p class="message">Já possui uma conta? <a href="<?=PATH?>cadastro">Entre aqui</a></p>
    </form>
  </div>
</div>


</div> <!-- Div sem fechar nada nessa pagina-->
</div> <!-- Div sem fechar nada nessa pagina-->
