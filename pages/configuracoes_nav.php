<div class="box">
  <div class="nav-config">
    <img class="img-sm rounded-circle float-left" src="images/user.png" alt="">
    <h4 class="font-weight-normal" style="font-family: 'Roboto';"><?php echo utf8_encode($_SESSION[usuario][usuario]); ?></h4>
    <a href="<?=PATH?>perfil">Ver perfil</a>
  </div>
    

  <ul class="nav flex-column nav-pills">
    <li class="nav-item">
      <a class="nav-link <?=($parametros[0]=='configuracoes-conta') ? 'active' : ''?>" href="<?=PATH?>configuracoes-conta">Conta</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?=($parametros[0]=='configuracoes-perfil') ? 'active' : ''?>" href="<?=PATH?>configuracoes-perfil">Perfil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?=($parametros[0]=='configuracoes-senha') ? 'active' : ''?>" href="<?=PATH?>configuracoes-senha">Senha</a>
    </li>
  </ul>
</div>  