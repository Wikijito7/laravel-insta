@include('head')
@include('header')
<main>
  <span>Iniciado sesión con: {{Auth::user()->username}}</span>
  <section>
    @foreach ($images as $image)
      <article class="image">
        <header>
          <a href="u/{{ App\User::find($image->id_user)->username }}">
            <img class="avatar" src="{{asset('storage/avatars/' . App\User::find($image->id_user)->avatar)}}" alt="Avatar usuario">
            <span>{{App\User::find($image->id_user)->username}}</span>
          </a>
        </header>
        <div class="img">
          <img src="{{ asset('storage/images/'.App\User::find($image->id_user)->username.'/'.$image->image) }}" alt="">
        </div>
        <div class="options">
          <p>{{$image->descripcion}}</p>
          <a href="like/{{$image->id}}">Like</a>
          @if($image->created_at != null)
            <p>{{\Carbon\Carbon::parse($image->created_at)->format('d/m/Y H:i:s')}}</p>
          @endif
        </div>
      </article>
    @endforeach
  </section>

</main>
@include('footer')
