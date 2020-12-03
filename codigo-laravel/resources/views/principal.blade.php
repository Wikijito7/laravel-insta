

@include('head')
@include('header')
<main>
  <span>{{Auth::user()->username}}</span>
  <section>
    @foreach ($images as $image)
      <article class="image">
        <span>{{App\User::find($image->id_user)->username}}</span><br>
        <img src="{{ asset('storage/images/'.App\User::find($image->id_user)->username.'/.$image->image) }}" alt="">
        <p></p>
        <p>{{$image->descripcion}}</p>
        <a href="like/{{$image->id}}"></a>
      </article>
    @endforeach
  </section>

</main>
@include('footer')
