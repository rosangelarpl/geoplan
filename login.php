<?php
  include_once "header.php";
?>
        <div class="container">
          <form>
            <h3>Login</h3>
            <div class="form-group row">
              <div class="col-sm-12">
                Email: <input type="email" class="form-control" placeholder="Email" value="" id="">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                Senha: <input type="password" class="form-control" placeholder="Senha" value="" id="">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">ENTRAR</button>
            <a href="cadastro.php" class="redcadastro"> Ou cadastre-se </a>
          </form>
        </div>
<?php
  include_once "footer.php";
?>
