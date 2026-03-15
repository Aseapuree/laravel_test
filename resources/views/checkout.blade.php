@extends('template')

@section('content')
<!-- Checkout Section Start -->
<section class="checkout-section fix section-padding">
  <div class="container">
    <div class="checkout-wrapper">
      <div class="top-content">
        <h2>Finalizar compra</h2>
        <ul class="list">
          <li>
            <a href="{{ route('index') }}">Inicio</a>
          </li>
          <li>
            Finalizar compra
          </li>
        </ul>
      </div>
      <form action="#" method="post">
        @csrf
        <div class="row g-4">
          <div class="col-lg-8">
            <div class="checkout-single-wrapper">
              <div class="checkout-single boxshado-single">
                <h4>Datos de facturación</h4>
                <div class="checkout-single-form">
                  <div class="row g-4">
                    <div class="col-lg-6">
                      <div class="input-single">
                        <span>Nombre *</span>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="input-single">
                        <span>Apellidos *</span>
                        <input type="text" name="last_name" value="{{ auth()->user()->last_name }}" disabled>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>DNI *</span>
                        <input type="text" name="document" value="{{ auth()->user()->document }}" disabled>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Razón social</span>
                        <input type="text" name="bussiness_name" value="{{ old('bussiness_name') }}">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>RUC*</span>
                        <input type="text" name="bussiness_document" value="{{ old('bussiness_document') }}">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Comprobante *</span>
                        <select class="form-select rounded-0" name="voucher">
                          <option value="">Seleccionar</option>
                          <option value="Boleta" @if(old('voucher') == 'Boleta') selected @endif>Boleta</option>
                          <option value="Factura" @if(old('voucher') == 'Factura') selected @endif>Factura</option>
                        </select>
                        @error('voucher')
                        <div class="text-danger small">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Ciudad *</span>
                        <input type="text" name="city" value="{{ old('city') }}">
                        @error('city')
                        <div class="text-danger small">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Dirección *</span>
                        <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}">
                        @error('address')
                        <div class="text-danger small">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Tipo de envío *</span>
                        <select class="form-select rounded-0" name="delivery_id">
                          <option value="">Seleccionar</option>
                          @foreach($deliveries as $delivery)
                          <option value="{{ $delivery->id }}" @if(old('delivery_id') == $delivery->id) selected @endif>
                            {{ $delivery->name }} (S/{{ $delivery->price }})
                          </option>
                          @endforeach
                        </select>
                        @error('delivery_id')
                        <div class="text-danger small">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="checkout-order-area">
              <h3>Detalle de pedido</h3>
              <div class="product-checout-area">
                <div class="checkout-item d-flex align-items-center justify-content-between">
                  <p>Producto</p>
                  <p>Subtotal</p>
                </div>
                @foreach($cart as $id => $item)
                <div class="checkout-item d-flex align-items-center justify-content-between">
                  <p>{{ $item['name'] }}</p>
                  <p>{{ $item['quantity'] }} x S/{{ $item['price'] }}</p>
                </div>
                @endforeach
                <div class="checkout-item d-flex align-items-center justify-content-between">
                  <p>Total</p>
                  <p>S/{{ number_format($total, 2) }}</p>
                </div>
                <h3>Método de pago</h3>
                <div class="checkout-item-2">
                  @foreach($payment_methods as $payment_method)
                  <div class="form-check-2 d-flex align-items-center from-customradio-2">
                    <input class="form-check-input" type="radio" name="payment_method_id" value="{{ $payment_method->id }}" 
                    id="payment_method_{{ $payment_method->id }}" @if(old('payment_method_id') == $payment_method->id) checked @endif>
                    <label class="form-check-label" for="payment_method_{{ $payment_method->id }}">
                      {{ $payment_method->name }}
                    </label>
                  </div>
                  @endforeach
                  @error('payment_method_id')
                  <div class="text-danger small">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <button type="submit" class="theme-btn mt-4">
                  Finalizar
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection