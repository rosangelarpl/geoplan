<?php
include_once "classes/Banco.php";

if (!empty($_POST)) {

  $foto = $_FILES["foto"];

  // Se a foto estiver sido selecionada
  if (!empty($foto["name"])) {
    
    // Largura máxima em pixels
    $largura = 250;
    // Altura máxima em pixels
    $altura = 250;
    // Tamanho máximo do arquivo em bytes
    $tamanho = 1000;
 
    $error = array();
 
      // Verifica se o arquivo é uma imagem
      if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
         $error[1] = "Isso não é uma imagem.";
      } 
  
    // Pega as dimensões da imagem
    $dimensoes = getimagesize($foto["tmp_name"]);
  
    // Verifica se a largura da imagem é maior que a largura permitida
    if($dimensoes[0] > $largura) {
      $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
    }
 
    // Verifica se a altura da imagem é maior que a altura permitida
    if($dimensoes[1] > $altura) {
      $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
    }
    
    // Verifica se o tamanho da imagem é maior que o tamanho permitido
    if($foto["size"] > $tamanho) {
        $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
    }
 
    // Se não houver nenhum erro
    if (count($error) == 0) {
    
      // Pega extensão da imagem
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
          // Gera um nome único para a imagem
          $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
          // Caminho de onde ficará a imagem
          $caminho_imagem = "images/fotos/" . $nome_imagem;
 
      // Faz o upload da imagem para seu respectivo caminho
      move_uploaded_file($foto["tmp_name"], $caminho_imagem);
    
      // Insere os dados no banco
      try{

      $altera_usuario = "update usuario set slug_foto = ? where id = ?";
      $query = Banco::instanciar()->prepare($altera_usuario);
      $query->bindValue(1, $nome_imagem);
      $query->bindValue(2, $_SESSION[usuario][id]);
      $query->execute();    
      } catch(PDOException $e){
        echo $e;
      }

    }

    // Se houver mensagens de erro, exibe-as
    if (count($error) != 0) {
      foreach ($error as $erro) {
        echo $erro . "<br />";
      }
    }
  
  }




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
            <form class="mt60 pl-4 pr-4" method="post" action="configuracoes-conta" enctype="multipart/form-data">
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
                  <input name="foto" type="file" class="custom-file-input" id="customFileLang" l>
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