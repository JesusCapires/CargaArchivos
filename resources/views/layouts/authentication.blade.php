<!DOCTYPE html>

<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>
    {{-- <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit."> --}}

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ asset('js/authentication-main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" >

    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">

</head>

<body class="bg-white">

    <div class="row authentication mx-0">

        <div class="col-xxl-7 col-xl-7 col-lg-12">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="p-5">
                        <div class="mb-3">
                            <a href="index.html">
                                <img src="{{ asset('images/brand-logos/desktop-logo.png') }}" alt="" class="authentication-brand desktop-logo">
                                <img src="{{ asset('images/brand-logos/desktop-dark.png') }}" alt="" class="authentication-brand desktop-dark">
                            </a>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-5 d-xl-block d-none px-0">
            <div class="authentication-cover">
                <div class="aunthentication-cover-content rounded">
                    <div class="swiper keyboard-control">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="mb-5">
                                            <img src="{{ asset('images/authentication/2.png') }}" class="authentication-image" alt="">
                                        </div>
                                        <h6 class="fw-semibold text-fixed-white">COMPAÑÍA</h6>
                                        <p class="fw-normal fs-14 op-7"> Qualtum brinda servicios al mercado automotriz tales como inspección, sorteo, contención, retrabajos, secuenciado y warehousing, entre otros. Ofrecemos servicios de ingeniería y soporte técnico 24/7 donde
                                            el cliente lo necesite.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="mb-5">
                                            <img src="{{ asset('images/authentication/3.png') }}" class="authentication-image" alt="">
                                        </div>
                                        <h6 class="fw-semibold text-fixed-white">COMPAÑÍA</h6>
                                        <p class="fw-normal fs-14 op-7">Para que nuestros clientes logren ofrecer mayor seguridad y eficiencia al consumidor contamos con una amplia gama de soluciones integrales que abarcan desde consultoría hasta la certificación de piezas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

    <!-- Internal Sing-Up JS -->
    <script src="{{ asset('js/authentication.js') }}"></script>

    <!-- Show Password JS -->
    <script src="{{ asset('js/show-password.js') }}"></script>

</body>

</html>
