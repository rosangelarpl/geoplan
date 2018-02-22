<div class="spad">
  <div class="container">

    
    
    <div class="row">
      <div class="col-md-8">
        <div class="box">
            <h2 class="post-title">PERFIL</h2>
            <form class="mt60 pl-4 pr-4">
              <div class="form-group row">
                <label for="input-nome" class="text-right col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="input-nome" placeholder="Nome">
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="input-localizacao" class="text-right col-sm-3 col-form-label">Localizacao</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="input-localizacao" placeholder="Local">
                </div>
              </div>

              <div class="form-group row">
                <label class="text-right col-sm-3 col-form-label">Biografia</label>
                <div class="col-sm-9">
                  <textarea class="form-control" maxlength="140"  placeholder="Texto" aria-label="With textarea"></textarea>
                  <small class="form-text text-muted">
                   No máximo 140 caracteres.
                  </small>
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