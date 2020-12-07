<header>
  <a id="insta" href="/">Instagram</a>
  @if ($principal)
  <nav>
    <a href="/subir"><i class="far fa-plus-square"></i></a>
    <a href="/buscar"><i class="fas fa-search"></i></a>
    <div class="">
      <a id="profile" onclick="sacarDesplegable()">{{ Auth::user()->username }}</a>
      <div id="desp" class="desp">
        <a id="profile" href="{{'/u/'.Auth::user()->username}}"><i class="fas fa-user-alt"></i> Perfil</a>
        <a href="/config"><i class="fas fa-cog"></i> Configuración</a>
        <a href="/salir"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
      </div>
    </div>
  </nav>
  @endif
</header>
