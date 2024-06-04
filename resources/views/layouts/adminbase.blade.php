<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Chime Emmanuel</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="ECR Technology Services, Developer, Web Developer, software Engineer, Umuahia Developer, Chime Emmanuel, Chime, Emmanuel" name="keywords">
        <meta content="System Consultant /Software Developer/Technical Customer Support Specialist @ ECR Technology Services" name="description">

  <!-- Favicons -->
  <link href="{{asset('assets/img/logo.png')}}" rel="icon"> 
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">



  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-VBK9D7CT6Z"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-VBK9D7CT6Z');
  </script>

  @livewireStyles
  <!-- =======================================================
  * Developer: Chime Emmanuel
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.adminmenu')
  <!-- End Header -->

  {{ $slot }}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script src="https://cdn.tiny.cloud/1/2zu36cvcpiw4nlloh7l0eezr1esvuu0mp8w9hvpp8zbyl08y/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  @livewireScripts
</body>

</html>