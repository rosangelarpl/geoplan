<div class="spad">
  <div class="container">

    
    
    <div class="row">
      <div class="col-md-8">
        <div class="box">
            <h2 class="post-title">CONFIGURAÇÕES DE CONTA</h2>
            <form class="mt60 pl-4 pr-4">
              <div class="form-group row">
                <label for="input-user" class="text-right col-sm-3 col-form-label">Usuário</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="input-user" placeholder="Usuário">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="text-right col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-3 text-right"><label class="col-form-label">Foto</label></div>
                <div class="col-sm-9">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
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