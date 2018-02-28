<?php
session_start();
function mostraAlerta($tipo){
	if(isset($_SESSION[$tipo])){
?>
<div class="alert alert-<?=$tipo?> alert-dismissible fade show" role="alert">
	<?=$_SESSION[$tipo]?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>

<?php
		unset($_SESSION[$tipo]);
	}
}

?>


    