@include('head')
@include('header')
<section id="user-info">
  <img class="avatar" src="{{asset('storage/avatars/' . $user->avatar)}}" alt="Avatar usuario">
  <span id="username">{{$user->username}}</span>
  <span id="name">{{$user->name}}</span>
</section>
<section class="profile-images">
  @foreach ($images as $image)
  <article class="img">
    <img src="{{ asset('storage/images/'.App\User::find($image->id_user)->username.'/'.$image->image) }}" alt="">
  </article>
  @endforeach
</section>

@include('footer')
