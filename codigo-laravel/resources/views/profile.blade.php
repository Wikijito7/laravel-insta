@include('head')
@include('header')
<main>
  <section id="user-info">
    <div class="img-cont">
      <img class="avatar" src="{{asset('storage/avatars/' . $user->avatar)}}" alt="Avatar usuario">
    </div>
    <div class="container">
      <div class="username">
        <span id="username">{{$user->username}}</span>
        @if ($user->id == Auth::user()->id)
        <a href="/config"><i class="fas fa-cog"></i> Editar perfil</a>
        @endif
      </div>
      <span id="pub">{{App\User::find($user->id)->images->count()}} Publicaciones</span>

      <span id="name">{{$user->name}}</span>
    </div>

  </section>
  <section class="profile-images">
    @foreach ($images as $image)
    <article class="img">
        <a href="/p/{{$image->id}}">
          <div class="texto">
            <p><i class="far fa-comment"></i> {{$image->comments->count()}}</p>
          </div>
          <img src="{{ asset('storage/images/'.App\User::find($image->id_user)->username.'/'.$image->image) }}" alt="">
        </a>

    </article>
    @endforeach
  </section>
</main>

@include('footer')
