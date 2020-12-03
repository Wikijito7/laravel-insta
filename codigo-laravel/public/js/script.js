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
