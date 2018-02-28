<?php
include_once "classes/Banco.php";
include_once "classes/Validacao.php";
include_once "pages/mostra-alerta.php";

if(!empty($_POST)){
  $nome = strip_tags(filter_input(INPUT_POST, 'nome'));
  $usuario = strip_tags(filter_input(INPUT_POST, 'usuario'));
  $email = strip_tags(filter_input(INPUT_POST, 'email'));
  $senha = strip_tags(filter_input(INPUT_POST, 'senha'));

  $val = new Validacao();
  $val->set($nome, 'nome')->obrigatorio();
  $val->set($usuario, 'usuário')->obrigatorio();
  $val->set($email, 'email')->isEmail();
  $val->set($senha, 'senha')->obrigatorio();

  if(!$val->validar()){
    $erros = $val->getErro();
    $_SESSION['danger'] = '<strong>'.$erros[0].'</strong>';
  }else{

    try{
      // Cadastrar usuário novo
      $insere_usuario = "insert into usuario (nome, email, senha, usuario) values (?,?,?,?)";
      $query = Banco::instanciar()->prepare($insere_usuario);
      $query->bindValue(1, $nome);
      $query->bindValue(2, $email);
      $query->bindValue(3, $senha);
      $query->bindValue(4, $usuario);
      $query->execute();

      $usuario_id = Banco::instanciar()->lastInsertId();

      //Encontra exercicios e registra os exercicios do usuario para analisar progresso
      $encontra_exercicios = "select * from exercicio";
      $query = Banco::instanciar()->prepare($encontra_exercicios);
      $query->execute();
      $exercicios = $query->fetchall(Banco::FETCH_ASSOC);
      foreach ($exercicios as $exercicio) :
        $insere_feitos = "insert into exercicios_feitos (id_usuario, id_exercicio) values (?, ?)";
        $query = Banco::instanciar()->prepare($insere_feitos);
        $query->bindValue(1, $usuario_id);
        $query->bindValue(2, $exercicio["id"]);
        $query->execute();
      endforeach;

      //Encontra assuntos e cria um avaliador de progresso para cada um
      $encontra_assuntos = "select * from assunto";
      $query = Banco::instanciar()->prepare($encontra_assuntos);
      $query->execute();
      $assuntos = $query->fetchall(Banco::FETCH_ASSOC);
      foreach ($assuntos as $assunto) :
        $insere_feitos = "insert into progresso (id_usuario, id_assunto) values (?, ?)";
        $query = Banco::instanciar()->prepare($insere_feitos);
        $query->bindValue(1, $usuario_id);
        $query->bindValue(2, $assunto["id"]);
        $query->execute();
      endforeach;

      // Cria perfil
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
      header( "location:perfil/".$_SESSION[usuario][usuario] );
    } catch(PDOException $e) {
      if($e->getCode() == "23000") {
        $_SESSION['danger'] = "<strong>Erro no cadastro</strong>. Usuário já existe.";
      }
      else $_SESSION['danger'] = "Algo deu errado. Tente novamente.";
    }
  }

}

?>


<div class="container spad">
  <?php 
    mostraAlerta("success");
    mostraAlerta("danger"); 
  ?>
  <div id="login" class="login-page">
    <div class="form">
      <form method="post" class="login-form" action="cadastro">
        <input type="text" name="nome" required placeholder="nome" title="Por favor, preencha esse campo." x-moz-errormessage="Por favor, preencha esse campo." value="<?=$_POST["nome"]?>"/>
        <input type="text" name="usuario" required placeholder="usuário" title="Por favor, preencha esse campo." x-moz-errormessage="Por favor, preencha esse campo." value="<?=$_POST["usuario"]?>"/>
        <input type="text" name="email" required placeholder="email" title="Por favor, preencha esse campo." x-moz-errormessage="Por favor, preencha esse campo." value="<?=$_POST["email"]?>"/>
        <input type="password" name="senha" required placeholder="senha" title="Por favor, preencha esse campo." x-moz-errormessage="Por favor, preencha esse campo." value="<?=$_POST["senha"]?>"/>

        <button type="submit" class="site-btn btn-2">CADASTRAR</button>
        <p class="message">Já possui uma conta? <a href="<?=PATH?>login">Entre aqui</a></p>
      </form>
    </div>
  </div>
</div>
