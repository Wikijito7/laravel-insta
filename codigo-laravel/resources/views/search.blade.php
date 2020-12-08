@include('head')
@include('header')

<main id="result">
  @foreach($users as $user)
  <article class="usuario" onclick="window.location.href = '/u/{{$user->username}}';">
    <img class="avatar" src="{{asset('storage/avatars/' . $user->avatar)}}" alt="Avatar usuario">
    <div class="cont-user">
      <a href="/u/{{$user->username}}">{{$user->username}}</a>
      <p>{{$user->name}}</p>
      <p id='pub'>{{App\User::find($user->id)->images->count()}} publicaciones</p>
    </div>
  </article>
  @endforeach
</main>

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script defer src="/js/script.js"></script>
</body>
</html>
