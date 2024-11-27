<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>FoodPark || Restaurant Template</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('ijaboCropTool/ijaboCropTool.min.css') }}">
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->



</head>

<body>

    <section class="fp__topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8">
                    <ul class="fp__topbar_info d-flex flex-wrap">
                        <li><a href="mailto:example@gmail.com"><i class="fas fa-envelope"></i> Unifood@gmail.com</a></li>
                        <li><a href="callto:123456789"><i class="fas fa-phone-alt"></i> +96487452145214</a></li>
                    </ul>
                </div>
                <div class="col-xl-6 col-md-4 d-none d-md-block">
                    <ul class="topbar_icon d-flex flex-wrap">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.menu')
    @yield('content')

    <footer>
        <div class="footer_overlay pt_100 xs_pt_70 pb_100 xs_pb_70">
            <div class="container wow fadeInUp" data-wow-duration="1s">
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-sm-8 col-md-6">
                        <div class="fp__footer_content">
                            <a class="footer_logo" href="index.html">
                                <!-- <img src="images/footer_logo.png" alt="FoodPark" class="img-fluid w-100"> -->
                            </a>
                            <span>There are many variations of Lorem Ipsum available, but the majority have
                                suffered.</span>
                            <p class="info"><i class="far fa-map-marker-alt"></i> 7232 Broadway Suite 308, Jackson
                                Heights, 11372, NY, United States</p>
                            <a class="info" href="callto:1234567890123"><i class="fas fa-phone-alt"></i> +1347-430-9510</a>
                            <a class="info" href="mailto:websolutionus1@gmail.com"><i class="fas fa-envelope"></i> websolutionus1@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-md-6">
                        <div class="fp__footer_content">
                            <h3>Short Link</h3>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Our Service</a></li>
                                <li><a href="#">Gallery</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-md-6 order-sm-4 order-lg-3">
                        <div class="fp__footer_content">
                            <h3>Help Link</h3>
                            <ul>
                                <li><a href="#">Terms And Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-8 col-md-6 order-lg-4">
                        <div class="fp__footer_content">
                            <h3>Subscribe</h3>
                            <form>
                                <input type="text" placeholder="Subscribe">
                                <button>Subscribe</button>
                            </form>
                            <div class="fp__footer_social_link">
                                <h5>Follow us:</h5>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fp__footer_bottom d-flex flex-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="fp__footer_bottom_text d-flex flex-wrap justify-content-between">
                            <p>Copyright 2022 <b>FoodPark</b> All Rights Reserved.</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Payment</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="fp__scroll_btn">
        Go to top
    </div>

    <!--jquery library js-->
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>
    <!-- slick slider -->
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    <!-- isotop js -->
    <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
    <!-- simplyCountdownjs -->
    <script src="{{asset('frontend/js/simplyCountdown.js')}}"></script>
    <!-- counter up js -->
    <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.countup.min.js')}}"></script>
    <!-- nice select js -->
    <script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
    <!-- venobox js -->
    <script src="{{asset('frontend/js/venobox.min.js')}}"></script>
    <!-- sticky sidebar js -->
    <script src="{{asset('frontend/js/sticky_sidebar.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <!-- ex zoom js -->
    <script src="{{asset('frontend/js/jquery.exzoom.js')}}"></script>
    <script src="{{asset('frontend/js/toastr.min.js')}}"></script>
    <!--main/custom js-->
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('ijaboCropTool/ijaboCropTool.min.js')}}"></script>

     <!-- show dynamic validation message-->
     <script>
        toastr.options.progressBar = true;

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>


    @include('frontend.layouts.global_scritps');


    @stack('scripts')
</body>

</html>
