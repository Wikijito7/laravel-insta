<header>
  <a id="insta" href="/">Instagram</a>
  @if ($principal)
  <form id="search" action="/buscar" method="post">
    @csrf
    <input type="text" name="search" placeholder="Buscar..." value="" autocomplete="false">
    <button type="submit"><i class="fas fa-search"></i></button>
  </form>
  <nav>
    <a href="/subir"><i class="far fa-plus-square"></i></a>
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
