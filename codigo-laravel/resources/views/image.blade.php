@include('head')
@include('header')

<article class="image">
  <header>
    <a href="/u/{{ App\User::find($image->id_user)->username }}">
      <img class="avatar" src="{{asset('storage/avatars/' . App\User::find($image->id_user)->avatar)}}" alt="Avatar usuario">
      <span>{{App\User::find($image->id_user)->username}}</span>
    </a>
    @if($image->id_user == Auth::user()->id)
    <div class="">
      <a href="#"><i class="fas fa-ellipsis-h"></i></a>
      <div class="">
        <a onclick="mostrarForm();">Editar</a>
        <a href="/del/{{$image->id}}">Eliminar</a>
      </div>
    </div>
    @endif
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
  <div class="desc-container">
    <p id="desc" class="desc">{{$image->descripcion}}</p>
    <form id="form-desc" style="display:none" class="form-desc" action="/edit/{{$image->id}}" method="post">
      @csrf
      <textarea name="descripcion" rows="8" cols="80">{{$image->descripcion}}</textarea>
      <button type="submit" name="enviar">
        <i class="fas fa-check"></i>
      </button>
      <a onclick="ocultarForm();"><i class="fas fa-times"></i></a>

    </form>
  </div>
  <div class="comments">
    @foreach(App\Images::find($image->id)->comments as $comment)
    <article class="comment">
      <p>
        <a href="/u/{{\App\User::find($comment->id_user)->username}}">{{\App\User::find($comment->id_user)->username}}</a>: {{$comment->descripcion}}
      </p>
      <span>{{\Carbon\Carbon::parse($comment->created_at)->format('d/m/Y H:i:s')}}</span>
    </article>

    @endforeach
    <form class="" action="/enviar-comentario" method="post">
      @csrf
      <input hidden type="text" name="image" value="{{$image->id}}">
      <textarea name="comentario" rows="2" placeholder="Añade un comentario..."
      cols="80" autocomplete="off" autocorrect="off"></textarea>
      <input type="submit" name="enviar" value="Publicar">
    </form>
  </div>
  @if($image->created_at != null)
    <p>{{\Carbon\Carbon::parse($image->created_at)->format('d/m/Y H:i:s')}}</p>
  @endif
</article>

@include('footer')
