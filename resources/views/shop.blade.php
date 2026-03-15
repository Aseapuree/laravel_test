@extends('template')

@section('content')
<!-- Shop-left-sideber-Section Start -->
<section class="shop-left-sideber-section section-padding fix">
<div class="container">
    <div class="product-details-wrapper">
        <div class="row g-4">
            <div class="col-lg-3">
                <form action="">
                    <div class="main-sideber">
                        <div class="single-sidebar-widget-2">
                            <div class="wid-title">
                                <h5>Precio</h5>
                            </div>
                            <div class="range__barcustom">
                                <div class="slider">
                                    <div class="progress" style="left: 0%; right: 0%;"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="1000" value="{{ request()->get('min_price', 0) }}" name="min_price">
                                    <input type="range" class="range-max" min="100" max="1000" value="{{ request()->get('max_price', 1000) }}" name="max_price">
                                </div>
                                <div class="range-items">
                                    <div class="price-input d-flex">
                                        <div class="field">
                                            <span>S/</span>
                                            <input type="number" class="input-min" value="{{ request()->get('min_price', 0) }}">
                                        </div>
                                        <div class="separators">-</div>
                                        <div class="field">
                                            <span>S/</span>
                                            <input type="number" class="input-max" value="{{ request()->get('max_price', 1000) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar-widget-2">
                            <div class="wid-title">
                                <h5>Categorías</h5>
                            </div>
                            <div class="product-list">
                                @foreach($categories as $category)
                                <label class="checkbox-single">
                                    <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                        <span class="checkbox-area d-center">
                                            <input type="radio" name="category_id" value="{{ $category->id }}" @if(request()->category_id == $category->id) checked @endif>
                                            <span class="checkmark bg-2 d-center"></span>
                                        </span>
                                        <span class="text-color">
                                            {{ $category->name }}
                                        </span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-sidebar-widget-2">
                            <div class="wid-title">
                                <h5>Marcas</h5>
                            </div>
                            <div class="product-list">
                                @foreach($brands as $brand)
                                <label class="checkbox-single">
                                    <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                        <span class="checkbox-area d-center">
                                            <input type="radio" name="brand_id" value="{{ $brand->id }}" @if(request()->brand_id == $brand->id) checked @endif>
                                            <span class="checkmark bg-2 d-center"></span>
                                        </span>
                                        <span class="text-color">
                                            {{ $brand->name }}
                                        </span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button class="theme-btn">Filtrar</button>
                    <a href="{{ route('shop') }}" class="theme-btn">Limpiar</a>
                </form>
            </div>
            <div class="col-lg-9">
                <div class="tab-content">
                    <div class="row g-4">
                        @if($products->count() > 0)
                        @foreach($products as $product)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="product-details-item mt-0">
                                <div class="shop-image">
                                    <img src="{{ asset('storage/'.$product->image) }}">
                                    <ul class="shop-icon d-grid justify-content-center align-items-center">
                                        <li>
                                            <form method="POST" action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <a href="#" onclick="this.closest('form').submit()"><i class="fa-regular fa-cart-shopping"></i></a>
                                            </form>
                                            
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <p>{{ $product->category->name }}</p>
                                    <h4>
                                        <a href="{{ route('product', $product) }}">{{ $product->name }}</a>
                                    </h4>
                                    <h6>S/{{ $product->price }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-md-12">
                             <p class="text-center">No se han encontrado productos.</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="page-nav-wrap">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection