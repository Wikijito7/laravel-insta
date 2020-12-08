<?php
  $titulo = "Inicia sesión";
  $principal = false;
?>
@include('head')
@include('header')
<section class="log-reg">
  <h1>Login</h1>
  <form method="POST" action="{{ route('login') }}">
      @csrf

      <label for="email">Correo electrónico</label><br>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
      @error('email')
          <span class="error">
              El usuario o la contraseña no es válido.
          </span><br>
      @enderror

      <label for="password">Contraseña</label><br>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>

      @error('password')
          <span class="error">
              <strong>{{ $message }}</strong>
          </span><br>
      @enderror
      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      <label for="remember">Recuérdame</label><br>
      <div class="center">
        <button type="submit">Iniciar sesión</button><br>
        <a href="{{route('register')}}">¿No tienes cuenta? Regístrate</a>
      </div>

  </form>
</section>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script defer src="/js/script.js"></script>
</body>
</html>
