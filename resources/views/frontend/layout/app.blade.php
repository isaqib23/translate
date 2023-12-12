
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
<link href="{{ asset('frontend/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/carousel.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Favicons -->
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }


      .whatsapp-fab {
          position: fixed;
          width: 60px;
          height: 60px;
          bottom: 40px;
          right: 40px;
          background-color: #25D366;
          color: white;
          border-radius: 50%;
          text-align: center;
          font-size: 30px;
          box-shadow: 2px 2px 3px #999;
          z-index: 100;
      }
      .whatsapp-fab:hover{
      color: white;
      }


      /* Blinking effect */
      @keyframes blinker {
          50% {
              opacity: 0;
          }
      }

      .whatsapp-fab {
          animation: blinker 5s linear infinite;
      }

    </style>


    <!-- Custom styles for this template -->
  </head>
  <body>
<a href="https://wa.me/+971567463549?text=Hello%20I%20have%20an%20inquiry" class="whatsapp-fab" target="_blank">
    <i class="fab fa-whatsapp fa-2x"></i>
</a>
<!-- Header -->
@include('frontend.layout.header')
<main>



@include('frontend.slider')
  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    @yield('content')


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">


    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
@include('frontend.layout.footer')
</main>


    <script src="{{ asset('frontend/bootstrap.bundle.min.js') }}" ></script>


  </body>
</html>
