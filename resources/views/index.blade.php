@extends('template')

@section('content')
<!-- Hero Section Start -->
<section class="hero-section-3">
    <div class="arrow-button">
        <button class="array-prev">
            <i class="fa-light fa-chevron-left"></i>
        </button>
        <button class="array-next">
            <i class="fa-light fa-chevron-right"></i>
        </button>
    </div>
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-3">
                    <div class="hero-bg bg-cover" style="background-image: url({{ asset('assets/web/img/hero/bg.jpeg') }});">
                    </div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-10">
                                <div class="hero-content">
                                    <p data-animation="fadeInUp" data-delay="1.3s">Belleza que inspira</p>
                                    <h1 data-animation="fadeInUp" data-delay="1.5s">
                                        Maquillaje de calidad<br>para cada ocasión 
                                    </h1>
                                    <div class="hero-button" data-animation="fadeInUp" data-delay="1.7s">
                                        <a href="#" class="theme-btn">Ver productos<i class="fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-3">
                    <div class="hero-bg bg-cover" style="background-image: url({{ asset('assets/web/img/hero/bg3.jpg') }});">
                    </div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-10">
                                <div class="hero-content">
                                    <p data-animation="fadeInUp" data-delay="1.3s">Tu belleza, tu estilo</p>
                                    <h1 data-animation="fadeInUp" data-delay="1.5s">
                                        Encuentra los <br>cosméticos perfectos para ti 
                                    </h1>
                                    <div class="hero-button" data-animation="fadeInUp" data-delay="1.7s">
                                        <a href="#" class="theme-btn">Compra Ahora<i class="fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-3">
                    <div class="hero-bg bg-cover" style="background-image: url({{ asset('assets/web/img/hero/bg2.jpeg') }});">
                    </div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-10">
                                <div class="hero-content">
                                    <p data-animation="fadeInUp" data-delay="1.3s">Tu rutina de bella empieza aqui</p>
                                    <h1 data-animation="fadeInUp" data-delay="1.5s">
                                        Encuentra labiales, bases y<br>sombras para cada ocasión
                                    </h1>
                                    <div class="hero-button" data-animation="fadeInUp" data-delay="1.7s">
                                        <a href="#" class="theme-btn">Explorar productos<i class="fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature-Section Start -->
<section class="feature-section fix">
    <div class="container">
        <div class="feature-wrapper">
            <div class="feature-item style-2 wow fadeInUp" data-wow-delay=".2s">
                <div class="icon">
                    <img src="{{ asset('assets/web/img/icon/01.svg') }}" alt="img">
                </div>
                <div class="content">
                    <h6>
                        Métodos de envío
                    </h6>
                    <p>Envío gratis dentro de la ciudad</p>
                </div>
            </div>
            <div class="feature-item wow fadeInUp" data-wow-delay=".4s">
                <div class="icon">
                    <img src="{{ asset('assets/web/img/icon/02.svg') }}" alt="img">
                </div>
                <div class="content">
                    <h6>
                        Garantía de producto
                    </h6>
                    <p>Garantía en todas tus compras</p>
                </div>
            </div>
            <div class="feature-item wow fadeInUp" data-wow-delay=".6s">
                <div class="icon">
                    <img src="{{ asset('assets/web/img/icon/03.svg') }}" alt="img">
                </div>
                <div class="content">
                    <h6>
                        Ofertas y descuentos
                    </h6>
                    <p>Aprovecha nuestras ofertas</p>
                </div>
            </div>
            <div class="feature-item wow fadeInUp" data-wow-delay=".8s">
                <div class="icon">
                    <img src="{{ asset('assets/web/img/icon/04.svg') }}" alt="img">
                </div>
                <div class="content">
                    <h6>
                        Soporte 24/7
                    </h6>
                    <p>Contáctanos via WhatsApp</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product-collection Section Start -->
<section class="product-collection-section-2 section-padding pt-0 fix">
    <div class="container">
        <div class="section-title style-2 text-center">
            <h6 class="sub-title wow fadeInUp">
                Descubre lo último
            </h6>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                Nuevos productos
            </h2>
        </div>
        <div class="tab-content">
            <div class="row">
                @foreach($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-collection-item">
                        <div class="product-image">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="img">
                            <div class="product-btn">
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <a href="#" class="theme-btn-2 style-2" onclick="this.closest('form').submit()">Añadir al carrito</a>
                                </form>
                            </div>
                        </div>
                        <div class="product-content">
                            <p>{{ $product->category->name }}</p>
                            <h4>
                                <a href="{{ route('product', $product) }}">{{ $product->name }}</a>
                            </h4>
                            <ul class="doller">
                                <li>
                                    S/{{ $product->price }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Product-collection Section Start -->
<section class="product-collection-section-2 section-padding pt-0 fix">
    <div class="container">
        <div class="section-title style-2 text-center">
            <h6 class="sub-title wow fadeInUp">
                Favoritos de la semana
            </h6>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                Productos más vendidos
            </h2>
        </div>
        <div class="tab-content">
            <div class="row">
                @foreach($favorites as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-collection-item">
                        <div class="product-image">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="img">
                            <div class="product-btn">
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <a href="#" class="theme-btn-2 style-2" onclick="this.closest('form').submit()">Añadir al carrito</a>
                                </form>
                            </div>
                        </div>
                        <div class="product-content">
                            <p>{{ $product->category->name }}</p>
                            <h4>
                                <a href="{{ route('product', $product) }}">{{ $product->name }}</a>
                            </h4>
                            <ul class="doller">
                                <li>
                                    S/{{ $product->price }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
