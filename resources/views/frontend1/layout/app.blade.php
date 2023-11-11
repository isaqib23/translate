<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Responsive Navbar</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend/styles.css') }}"> <!-- Link to your CSS file -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" />
<style>
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background-color: #25d366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
    z-index: 1000;
}

.whatsapp-float i {
    color: #ffffff;
}


</style>
</head>

<body>
<!-- <a href="https://wa.me/+971567463549?text=Hello%20I%20have%20an%20inquiry" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp fa-2x"></i>
</a>
-->
@include('frontend.layout.header')

@yield('content')

  <!-- Add Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- Add Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
          document.querySelectorAll('.img-radio').forEach(function(img) {
              img.addEventListener('click', function() {
                  var radio = img.previousElementSibling;
                  radio.checked = true;
                  document.querySelectorAll('input[name="' + radio.name + '"]').forEach(function(radio) {
                      radio.nextElementSibling.classList.toggle('selected', radio.checked);
                  });
              });
          });
      });
    Dropzone.options.myDropzone = {
      url: '/upload',  // Laravel endpoint for file uploads
      maxFiles: 1,
      acceptedFiles: "image/*,video/*,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/pdf",
      init: function() {
      this.on("sending", function(file, xhr, formData) {
          // Add CSRF token
          xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

          // Get selected radio button values
          let frameRadioValue = document.querySelector('input[name="frameRadio"]:checked')?.value;
          let imageRadioValue = document.querySelector('input[name="imageRadio"]:checked')?.value;

          // Add radio button values to form data
          if(frameRadioValue) {
              formData.append("frameRadio", frameRadioValue);
          }
          if(imageRadioValue) {
              formData.append("imageRadio", imageRadioValue);
          }
      });
      this.on("success", function(file, response, formData) {
      console.log(response)
      if (response.success) {
          window.location.href = '/?message=' + encodeURIComponent(response.message);
      } else {
          alert(response.message);
      }
      });
        this.on("uploadprogress", function(file, progress) {
          console.log("File progress", progress);
        });
        this.on("addedfile", function(file) {
          if (file.type.match(/image.*/)) {
            // If the file is an image, display a thumbnail
            var reader = new FileReader();
            reader.onload = function(event) {
              var imgElement = document.createElement('img');
              imgElement.style.maxWidth = '100%';
              imgElement.style.maxHeight = '100%';
              imgElement.src = event.target.result;
              file.previewElement.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
          } else if (file.type.match(/video.*/)) {
            // If the file is a video, display a thumbnail with a video icon overlay
            var videoIconElement = document.createElement('div');
            videoIconElement.style.position = 'relative';
            videoIconElement.innerHTML = '<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 2em; color: white;">🎥</div>';
            file.previewElement.appendChild(videoIconElement);
          } else {
            // If the file is a document, display a thumbnail with a document icon overlay
            var docIconElement = document.createElement('div');
            docIconElement.style.position = 'relative';
            docIconElement.innerHTML = '<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 2em; color: white;">📄</div>';
            file.previewElement.appendChild(docIconElement);
          }
        });
      }
    };
  </script>

</body>

</html>
