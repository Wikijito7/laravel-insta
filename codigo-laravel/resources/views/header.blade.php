<header>
  <a href="/">Instagram</a>
  @if ($principal)
  <nav>
    <a href="/subir"><i class="far fa-plus-square"></i></a>
    <a href="/buscar"><i class="fas fa-search"></i></a>
    <div class="">
      <a id="profile" onclick="sacarDesplegable()">{{ Auth::user()->username }}</a>
      <div id="desp" class="desp">
        <a id="profile" href="{{'/u/'.Auth::user()->username}}">Perfil</a>
        <a href="/salir">Cerrar sesión</a>
      </div>
    </div>
  </nav>
  @endif
</header>
