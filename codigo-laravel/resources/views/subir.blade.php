@include('head')
@include('header')
<main id="subirform">
  <header>
    <h1>Sube tu imagen</h1>
    <a href="/"><i class="fas fa-arrow-left"></i> Volver</a>
  </header>
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <span class="error"> {{$error}} </span><br>
       @endforeach
    @endif
    <img id="preview" style="display:none" src="" alt="vista previa de la imagen">
    <label id="subir" for="img">Subir imagen</label><br>
    <input hidden type="file" id="img" onchange="readURL(this);" name="img" value="" accept="image/png, image/jpeg"><br>
    <label for="desc">Descripción</label><br>
    <textarea name="desc" id="desc" rows="8" cols="80"></textarea><br>
    <input type="submit" name="enviar" value="Subir imagen">
  </form>
</main>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script defer src="/js/script.js"></script>
</body>
</html>
