console.log("hey!");

function readURL(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();
         var img = document.getElementById('preview');

         img.style.display = "block";

         reader.onload = function (e) {
            console.log(e);
            img.src = e.target.result;
         }

         reader.readAsDataURL(input.files[0]);
     }
}

function sacarDesplegable() {
  let desp = document.getElementById('desp');
  desp.style.display = "block";
}

function mostrarForm() {
  let form = document.getElementById('form-desc');
  let desc = document.getElementById('desc');

  form.style.display = "block";
  desc.style.display = "none";
}

function ocultarForm() {
  let form = document.getElementById('form-desc');
  let desc = document.getElementById('desc');

  form.style.display = "none";
  desc.style.display = "block";
}

function upload() {
  let form = document.getElementById('avatarform');
  form.submit();
}

window.onclick = function(event) {
  let btn = document.getElementById('profile');
  let desp = document.getElementById('desp');

  if (event.target != btn) {
    desp.style.display = "none";
  }
}
