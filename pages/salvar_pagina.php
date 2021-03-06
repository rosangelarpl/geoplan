<?php


include_once "classes/Banco.php";

if (!empty($_SESSION["usuario"])) {

if(!empty($_POST)) {

  if($_POST["salvar_pagina"] == "salvar_pagina"){
    try{
    $insere_perfil = "insert into salva_pagina (id_usuario, pagina) values (?, ?)";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $parametros[0]);
    $query->execute();
    

    $insere_acao = "insert into historico (id_usuario, acao, id_acao) values (?, 'salvar_pagina', LAST_INSERT_ID())";
    $query = Banco::instanciar()->prepare($insere_acao);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->execute();
    } catch (PDOException $e) {
    }

  } elseif ($_POST["salvar_pagina"] == "remover_pagina") {

    try{
    $insere_perfil = "delete from salva_pagina where id_usuario = ? and pagina = ?";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $parametros[0]);
    $query->execute();


    } catch (PDOException $e) {

    }
  }

  
}
$encontra_paginas = "select pagina from salva_pagina where id_usuario = ? and pagina = ?";
$query = Banco::instanciar()->prepare($encontra_paginas);
$query->bindValue(1, $_SESSION["usuario"]["id"]);
$query->bindValue(2, $parametros[0]);
$query->execute();
$pagina = $query->fetch(Banco::FETCH_ASSOC);
if ($pagina["pagina"] !== $parametros[0]) {
?>

<div class="favorite">
  <form method="post" action="<?=$parametros[0]?>">
    <input type="hidden" value="salvar_pagina" name="salvar_pagina"/>
    <button type="submit" class="site-btn btn-favorite-3"> SALVAR PÁGINA</button>
  </form>
</div>

<?php } else { ?>

<div class="favorite">
  <form method="post" action="<?=$parametros[0]?>">
    <input type="hidden" value="remover_pagina" name="salvar_pagina"/>
    <button type="submit" class="site-btn btn-favorite-active-3"> PÁGINA SALVA</button>
  </form>
</div>


<?php } ?>
<?php } 