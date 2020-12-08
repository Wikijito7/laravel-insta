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

function textAreaAdjust(el) {
  el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "47px";
}

function sacarDesplegable() {
  let desp = document.getElementById('desp');
  desp.style.display = "block";
}

function sacarOpciones() {
  let desp = document.getElementById('opcimage');
  desp.style.display = "block";
  console.log(desp.style.display);
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
  let opcimage = document.getElementById('opcimage');
  let dots = document.getElementById('dots');
  
  if (event.target != btn && event.target != dots) {
    desp.style.display = "none";
    opcimage.style.display = "none";
  }
}
