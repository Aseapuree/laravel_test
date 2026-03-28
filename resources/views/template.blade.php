<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ======== Page title ============ -->
    <title>Boutique</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ asset('assets/web/img/favicon.svg') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/swiper-bundle.min.css') }}">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/nice-select.css') }}">
    <!--<< Color.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/color.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/main.css') }}">
</head>
<body>

<!-- Back To Top Start -->
<button id="back-top" class="back-to-top">
    <i class="fa-regular fa-arrow-up"></i>
</button>

<!--<< Mouse Cursor Start >>-->  
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<!-- fix-area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="#">
                            <img src="{{ asset('assets/web/img/logo/red-logo.svg') }}" alt="logo-img">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix mb-3"></div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header bottom Start -->
<div class="header-bottom-section">
    <div class="container">
        <div class="header-bottom-wrapper">
            <ul class="contact-list">
                <li>
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:+51947338369">+51 947338369</a>
                </li>
                <li>
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:ecomas.boutique@gmail.com">ecomas.boutique@gmail.com</a>
                </li>
            </ul>
            <p>
                Ofertas, descuentos y mucho más <span>¡Compra ahora!</span>
            </p>
        </div>
    </div>
</div>

<!-- Header Section Start -->
<header id="header-sticky" class="header-1">
    <div class="container-fluid style-2">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="logo">
                    <a href="#" class="header-logo">
                        <img src="{{ asset('assets/web/img/logo/red-logo.svg') }}" alt="logo-img">
                    </a>
                    <a href="#" class="header-logo-2 d-none">
                        <img src="{{ asset('assets/web/img/logo/red-logo.svg') }}" alt="logo-img">
                    </a>
                </div>
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu" style="display: block;">
                            <ul>
                                <li>
                                    <a href="{{ route('index') }}">Inicio</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}">Tienda</a>
                                </li>
                                
                                
                                @if(auth()->guard('web')->check())
                                <li>
                                    <a href="#">
                                        {{ auth()->guard('web')->user()->name }}
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('profile') }}">Perfil</a></li>
                                        <li><a href="{{ route('orders') }}">Pedidos</a></li>
                                        <li><a href="{{ route('auth.logout') }}">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                                @else
                                <li>
                                    <a href="{{ route('auth.login') }}">Ingresar</a>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <a href="#0" class="search-trigger search-icon"><i class="fa-regular fa-magnifying-glass"></i></a>
                    <a href="{{ route('cart') }}">
                        <i class="fa-sharp fa-regular fa-shopping-cart"></i>
                    </a>
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- search-wrap Start -->
<div class="search-wrap">
    <div class="search-inner">
        <i class="fas fa-times search-close" id="search-close"></i>
        <div class="search-cell">
            <form method="get" action="{{ route('shop') }}">
                <div class="search-field-holder">
                    <input type="search" class="main-search-input" name="search" placeholder="Buscar...">
                </div>
            </form>
        </div>
    </div>
</div>

@yield('content')


<!-- footer-section Start -->
<footer class="footer-section footer-bg-2 fix">
    <div class="container">
        <div class="footer-widget-wrapper style-2">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="#" class="footer-logo">
                                <img src="{{ asset('assets/web/img/logo/white-logo.svg') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="footer-content">
                            <div class="social-item">
                                <p>
                                    Somos una tienda virtual encargados de brindarte las mejores ofertas en productos de belleza y cuidado personal.
                                </p>
                                <div class="social-icon style-3 d-flex align-items-center">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-tiktok"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Mi cuenta</h3>
                        </div>
                        <ul class="list-items style-color">
                            @if(auth()->guard('web')->check())
                            <li>
                                <a href="{{ route('profile') }}">
                                    Perfil
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('orders') }}">
                                    Pedidos
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('auth.login') }}">Ingresar</a>
                            </li>
                            <li>
                                <a href="{{ route('auth.register') }}">Registrarse</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Enlaces</h3>
                        </div>
                        <ul class="list-items style-color">
                            <li>
                                <a href="{{ route('index') }}">
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('shop') }}">
                                    Tienda
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cart') }}">
                                    Carrito
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('book') }}">
                                    Libro de reclamaciones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Contáctanos<h3>
                        </div>
                        <div class="footer-content">
                            <div class="text">
                                <p>¿Dudas o Consultas?</p>
                                <a href="tel:+51947338369">+51 947338369</a>
                            </div>
                            <ul class="contact-list">
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <a href="mailto:ecomas.boutique@gmail.com">ecomas.boutique@gmail.com</a>
                                </li>
                                <li>
                                    <i class="fa-regular fa-location-dot"></i>
                                    Somos una tienda virtual.<br>
                                    Chiclayo, Perú.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>

<!--<< All JS Plugins >>-->
<script src="{{ asset('assets/web/js/jquery-3.7.1.min.js') }}"></script>
<!--<< Viewport Js >>-->
<script src="{{ asset('assets/web/js/viewport.jquery.js') }}"></script>
<!--<< Bootstrap Js >>-->
<script src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery.nice-select.min.js') }}"></script>
<!--<< Waypoints Js >>-->
<script src="{{ asset('assets/web/js/jquery.waypoints.js') }}"></script>
<!--<< Counterup Js >>-->
<script src="{{ asset('assets/web/js/jquery.counterup.min.js') }}"></script>
<!--<< Swiper Slider Js >>-->
<script src="{{ asset('assets/web/js/swiper-bundle.min.js') }}"></script>
<!--<< MeanMenu Js >>-->
<script src="{{ asset('assets/web/js/jquery.meanmenu.min.js') }}"></script>
<!--<< Magnific Popup Js >>-->
<script src="{{ asset('assets/web/js/jquery.magnific-popup.min.js') }}"></script>
<!--<< Wow Animation Js >>-->
<script src="{{ asset('assets/web/js/wow.min.js') }}"></script>
<!--<< Main.js >>-->
<script src="{{ asset('assets/web/js/main.js') }}"></script>
</body>
</html>
