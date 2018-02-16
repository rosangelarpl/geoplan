<!--
Acrescentei a coluna 'pagina' na tabela de 'comentarios' no banco de dados, pra poder filtrar os comentários pelas páginas tbm.

ALTER TABLE `comentario` ADD `pagina` VARCHAR(48) NOT NULL AFTER `texto`;

-->
<!--  -->

<?php


include_once "classes/banco.php";

if (!empty($_SESSION["usuario"])) {

	if(!empty($_POST["comentario"])) {

    try{
    $insere_comentario = "insert into comentario (id_usuario, pagina, texto) values (?, ?, ?)";
    $query = Banco::instanciar()->prepare($insere_comentario);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $pag);
    $query->bindValue(3, $_POST["comentario"]);
    $query->execute();
    } catch (PDOException $e) {
 
    }
  }
}
$encontra_comentarios = "select c.*,u.nome from comentario as c join usuario as u on u.id=c.id_usuario where pagina = '$pag' ORDER BY id ASC";
$query = Banco::instanciar()->prepare($encontra_comentarios);
$query->execute();
$comentarios = $query->fetchall(Banco::FETCH_ASSOC);

$asd = "select p.*, c.nome as cat_nome from produtos as p join categ as c on c.id=p.categoria_id";


if (!empty($_SESSION["usuario"])) { ?> <!-- VERIFICA SE TA LOGADO -->

<!-- FORMULARIO DOS COMENTARIOS  -->
<div class="container">
<hr/>
<h3>Deixe-nos um comentário</h3>
<p></p>
  <form class="comen"  method="post" action="<?=$pag?>.php">

    <div class="form-group row">
      <div class="col-sm-12">
        <label for="textarea">Comente:</label>
        <textarea name="comentario" class="form-control" id="textarea" placeholder="Digite seu comentário aqui" rows="3"></textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Comentar</button>

  </form>

</div>

<!-- LISTANDO COMENTARIOS -->
<div class="container">
	<hr/>
	<h3>Ultimos Comentarios</h3>
	<?php	foreach($comentarios as $comentario) : ?>  <!-- LAÇO DE REPETIÇÃO -->

		<p><?=$comentario['nome']?>: <!-- $comentario['nome'] É A VARIÁVEL QUE CONTEM O NOME -->
			<br>
			<?=$comentario['texto']?> <!-- $comentario['texto'] É A VARIÁVEL QUE CONTEM O COMENTÁRIO -->

		</p>

	<?php	endforeach	?> <!-- FIM DO LAÇO -->
</div>

<?php } ?>
