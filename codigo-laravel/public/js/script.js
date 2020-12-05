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

window.onclick = function(event) {
  let btn = document.getElementById('profile');
  let desp = document.getElementById('desp');

  if (event.target != btn) {
    desp.style.display = "none";
  }
}
