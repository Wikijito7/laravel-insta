@include('head')
@include('header')
<main id="config">
  <section>
    <article class="img">
      <img class="avatar" src="{{asset('storage/avatars/' . $user->avatar)}}" alt="Avatar usuario">
      <div class="cambiaravatar">
        <span>{{$user->username}}</span>
        <form class="" id="avatarform" action="/avatar" method="POST" enctype="multipart/form-data">
          @csrf
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <span id="error"> {{$error}} </span>
             @endforeach
          @endif
          <input type="file" hidden id="img" onchange="form.submit()" name="img" value="" accept="image/png, image/jpeg">
          <label for="img">Cambiar la foto de perfil</label>
        </form>
        <a href="/delavatar">Eliminar foto actual</a>
      </div>
    </article>
    <article class="datos">
      <h3>Editar perfil</h3>
      <form class="" action="/config" method="post">
        @csrf
        <label for="name">Nombre</label><br>
        <input type="text" id="name" name="name" placeholder="Nombre" value="{{$user->name}}"><br>
        <p class="info">
          Para que la gente te reconozca mejor en la red social, es recomendable
          que te pongas un nombre, sea el tuyo real, tu apodo o el comercial.
        </p>
        <label for="email">Correo electrónico</label><br>
        <input type="text" id="email" name="email" placeholder="Correo electrónico" value="{{$user->email}}"><br>

        <input type="submit" name="" value="Enviar">
      </form>
    </article>
  </section>

</main>
@include('footer')
