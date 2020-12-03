@include('head')
@include('header')
<main>
  <h1>Sube tu imagen</h1>
  <a href="/">Volver</a>
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <img id="preview" style="display:none" src="" alt="vista previa de la imagen">
    <label for="img">Subir imagen</label><br>
    <input type="file" id="img" onchange="readURL(this);" name="image" value="" accept="image/png, image/jpeg"><br>
    <label for="desc">Descripción</label><br>
    <textarea name="desc" id="desc" rows="8" cols="80"></textarea><br>
    <input type="submit" name="enviar" value="Subir imagen">
  </form>
</main>
@include('footer')
