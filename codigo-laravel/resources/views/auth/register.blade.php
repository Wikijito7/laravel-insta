<?php
  $titulo = "Registrar una nueva cuenta";
  $principal = false;
?>
@include('head')
@include('header')

<section class="log-reg">
  <h1>Crear cuenta</h1>
  <form method="POST" action="{{ route('register') }}">
      @csrf
      <label for="username">Nombre de usuario</label>
      <br>
      <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{ old('name') }}" required autocomplete="name" autofocus>
      <br>
      @error('name')
          <span class="error">
              <strong>{{ $message }}</strong>
          </span>
          <br>
      @enderror
      <label for="email">Correo electrónico</label>
      <br>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      <br>
      @error('email')
          <span class="error">
              <strong>{{ $message }}</strong>
          </span>
          <br>
      @enderror

      <label for="password">Contraseña</label>
      <br>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      <br>

      @error('password')
          <span class="error">
              <strong>{{ $message }}</strong>
          </span>
          <br>
      @enderror

      <label for="password-confirm">Confirma la contraseña</label>
      <br>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      <br>
      <div class="center">
        <button type="submit">Registrarse</button>
        <br>
        <a href="{{route('login')}}">¿Tienes cuenta?</a>
      </div>

  </form>
</section>

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script defer src="/js/script.js"></script>
</body>
</html>
