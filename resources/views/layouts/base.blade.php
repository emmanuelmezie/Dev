<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Chime Emmanuel</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="ECR Technology Services, Developer, Web Developer, software Engineer, Umuahia Developer, Chime Emmanuel, Chime, Emmanuel" name="keywords">
        <meta content="System Consultant /Software Developer/Technical Customer Support Specialist @ ECR Technology Services" name="description">

        <!-- Favicon -->
        <link href="{{asset('assets/img/logo.png')}}" rel="icon"> 

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('dist/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('dist/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('dist/lib/animate/animate.min.css')}}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
        @livewireStyles
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        {{ $slot }}

        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('dist/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('dist/lib/typed/typed.min.js')}}"></script>
        <script src="{{asset('dist/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('dist/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('dist/lib/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('dist/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('dist/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('dist/lib/lightbox/js/lightbox.min.js')}}"></script>

        <!-- Contact Javascript File -->
        <script src="{{asset('dist/mail/jqBootstrapValidation.min.js')}}"></script>
        <script src="{{asset('dist/mail/contact.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('dist/js/main.js')}}"></script>
        @livewireScripts
    </body>
</html>