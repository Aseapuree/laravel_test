@extends('template')

@section('content')
<!-- cart section start -->
<div class="cart-section section-padding">
  <div class="container">
    <div class="cart-list-area">
      <div class="top-content">
        <h2>Carrito</h2>
        <ul class="list">
          <li>
            <a href="{{ route('index') }}">Inicio</a>
          </li>
          <li>
            Carrito
          </li>
        </ul>
      </div>
      @if(count($cart) > 0)
      <div class="table-responsive">
        <table class="table common-table">
          <thead data-aos="fade-down">
            <tr>
              <th class="text-center">Producto</th>
              <th class="text-center">Precio</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Subtotal</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($cart as $id => $item)
            <tr class="align-items-center py-3">
              <td>
                <div class="cart-item-thumb d-flex align-items-center gap-4">
                  <img class="w-100" src="{{ asset('storage/'.$item['image']) }}">
                  <span class="head text-nowrap">{{ $item['name'] }}</span>
                </div>
              </td>
              <td class="text-center">
                <span class="price-usd">
                  S/{{ $item['price'] }}
                </span>
              </td>
              <td class="price-quantity text-center">
                <form method="POST" action="{{ route('cart.update') }}">
                  @csrf
                  <input type="hidden" name="id" value="{{ $id }}">
                  <div class="quantity d-inline-flex align-items-center justify-content-center gap-1 py-2 px-4 border n50-border_20 text-sm">
                    <button type="button" class="quantityDecrement"><i class="fal fa-minus"></i></button>
                    <input type="text" value="{{ $item['quantity'] }}" class="quantityValue" name="quantity">
                    <button type="button" class="quantityIncrement"><i class="fal fa-plus"></i></button>
                  </div>
                  <button type="submit" class="theme-btn mt-1">
                    <span>Actualizar</span>
                  </button>
                  
                </form>

              </td>
              <td class="text-center">
                <span class="price-usd">
                  S/{{ number_format($item['price'] * $item['quantity'], 2) }}
                </span>
              </td>
              <td class="text-center">
                <form method="POST" action="{{ route('cart.remove') }}">
                  @csrf
                  <input type="hidden" name="id" value="{{ $id }}">
                  <a class="theme-btn" href="#" onclick="this.closest('form').submit()">Eliminar</a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="coupon-items d-flex flex-md-nowrap flex-wrap justify-content-between align-items-center gap-4 pt-4">
        <form method="POST" action="{{ route('cart.clear') }}">
          @csrf
          <a class="theme-btn" href="#" onclick="this.closest('form').submit()">Vaciar carrito</a>
        </form>
        <a href="{{ route('checkout') }}" class="theme-btn">Finalizar compra</a>
      </div>
      @else
      <div class="text-center">
        <p class="mb-4">
          No se han encontrado productos
        </p>
        <a href="{{ route('shop') }}" class="theme-btn">Ir a tienda</a>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection