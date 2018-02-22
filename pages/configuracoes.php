<div class="spad">
  <div class="container">

    
    
    <div class="row">
      <div class="col-md-8">
        <div class="box">
            <h2 class="post-title">CONFIGURAÇÕES DE CONTA</h2>
            <form class="mt60 pl-4 pr-4">
              <div class="form-group row">
                <label for="inputEmail3" class="text-right col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="text-right col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                  </small>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-3 text-right"><label class="col-form-label">Foto</label></div>
                <div class="col-sm-9">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                  <label class="custom-file-label" for="customFileLang">Foto do perfil</label>
                  </div>
                </div>
                
              </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary mt-5 float-right">Salvar alterações</button>
                </div>
              </div>
            </form>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box">
          <div class="nav-config">
            <img class="img-sm rounded-circle float-left" src="images/user.png" alt="">
            <h4 class="font-weight-normal" style="font-family: 'Roboto';">usuariox</h4>
            <a href="">Ver perfil</a>
          </div>
            

          <ul class="nav flex-column nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="<?=PATH?>configuracoes-conta">Conta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=PATH?>configuracoes-perfil">Perfil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="configuracoes-perfil">Senha</a>
            </li>
          </ul>
        </div>  
      </div>
    </div>

  </div>
</div>