<?php
  include_once "header.php";
?>
        <p class="obs">Preencha as informações a seguir para fazer cadastro no site.</p>
        <div class="container">
          <form>
            <h3>Realizar Cadastro</h3>
            <div class="form-group row">
              <div class="col-sm-12">
              Nome:  <input type="text" class="form-control" placeholder="Nome" value="" id="nome">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
              Email: <input type="text" class="form-control"placeholder="Email" value="" id="email">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
              Senha: <input type="password" class="form-control"placeholder="Senha">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">CADASTRAR</button>
          </form>
        </div>
      </div> <!-- Div sem fechar nada nessa pagina-->
    </div> <!-- Div sem fechar nada nessa pagina-->
<?php
    include_once "footer.php";
