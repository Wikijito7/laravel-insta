@include('head')
@include('header')
<main>
  <section id='images'>
    @foreach ($images as $image)
      @include('imagely')
    @endforeach
  </section>

</main>
@include('footer')
