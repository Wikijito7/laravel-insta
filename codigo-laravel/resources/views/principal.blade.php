@include('head')
@include('header')
<main>
  <span>Iniciado sesión con: {{Auth::user()->username}}</span>
  <section>
    @foreach ($images as $image)
      <article class="image">
        <header>
          <a href="/u/{{ App\User::find($image->id_user)->username }}">
            <img class="avatar" src="{{asset('storage/avatars/' . App\User::find($image->id_user)->avatar)}}" alt="Avatar usuario">
            <span>{{App\User::find($image->id_user)->username}}</span>
          </a>
        </header>
        <div class="img">
          <img src="{{ asset('storage/images/'.App\User::find($image->id_user)->username.'/'.$image->image) }}" alt="">
        </div>
        <div class="options">
          @if(Auth::user()->hasLiked($image->id))
          <a href="/like/{{$image->id}}"><i class="fas fa-heart"></i></a>
          @else
          <a href="/like/{{$image->id}}"><i class="far fa-heart"></i></a>
          @endif
          <a href="/p/{{$image->id}}"><i class="far fa-comment"></i></a>
        </div>
        <span>{{App\Images::find($image->id)->likes->count()}} likes</span>
        <p class="desc">{{$image->descripcion}}</p>
        <div class="comments">
          @foreach(App\Images::find($image->id)->comments as $comment)
            <p>{{$comment}}</p>
          @endforeach
          <form class="" action="index.html" method="post">

          </form>
        </div>
        @if($image->created_at != null)
          <p>{{\Carbon\Carbon::parse($image->created_at)->format('d/m/Y H:i:s')}}</p>
        @endif
      </article>
    @endforeach
  </section>

</main>
@include('footer')
