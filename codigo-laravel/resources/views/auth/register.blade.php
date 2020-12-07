<?php
  $titulo = "Registrar una nueva cuenta";
  $principal = false;
?>
@include('head')
@include('header')

<section>
  <h1>Crear cuenta</h1>
  <form method="POST" action="{{ route('register') }}">
      @csrf
      <label for="username">Nombre de usuario</label>
      <br>
      <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{ old('name') }}" required autocomplete="name" autofocus>
      <br>
      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          <br>
      @enderror
      <label for="email">Correo electrónico</label>
      <br>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      <br>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          <br>
      @enderror

      <label for="password">Contraseña</label>
      <br>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      <br>

      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          <br>
      @enderror

      <label for="password-confirm">Confirma la contraseña</label>
      <br>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      <br>

      <button type="submit">Registrarse</button>
      <br>
      <a href="{{route('login')}}">¿Tienes cuenta?</a>

  </form>
</section>

@include('footer')
