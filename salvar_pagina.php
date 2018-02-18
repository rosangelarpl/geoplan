<?php


include_once "classes/banco.php";

if (!empty($_SESSION["usuario"])) {

if(!empty($_POST)) {

  if($_POST["salvar_pagina"] == "salvar_pagina"){
    try{
    $insere_perfil = "insert into salva_pagina (id_usuario, pagina) values (?, ?)";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $pag);
    $query->execute();
    } catch (PDOException $e) {
    }

  } else {

    try{
    $insere_perfil = "delete from salva_pagina where id_usuario = ? and pagina = ?";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $pag);
    $query->execute();

    } catch (PDOException $e) {

    }
  }

  
}
$encontra_paginas = "select pagina from salva_pagina where id_usuario = ? and pagina = ?";
$query = Banco::instanciar()->prepare($encontra_paginas);
$query->bindValue(1, $_SESSION["usuario"]["id"]);
$query->bindValue(2, $pag);
$query->execute();
$pagina = $query->fetch(Banco::FETCH_ASSOC);
if ($pagina["pagina"] !== $pag) {
?>

<div class="favorite">
  <form method="post" action="<?=$pag?>.php">
    <input type="hidden" value="salvar_pagina" name="salvar_pagina"/>
    <button type="submit" class="btn-favorite"></button>
  </form>
</div>

<?php } else { ?>

<div class="favorite">
  <form method="post" action="<?=$pag?>.php">
    <input type="hidden" value="remover_pagina" name="salvar_pagina"/>
    <button type="submit" class="btn-favorite-active"></button>
  </form>
</div>


<?php } ?>
<?php } 