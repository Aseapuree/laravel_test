@extends('template')

@section('content')
<!-- Checkout Section Start -->
<section class="checkout-section fix section-padding">
  <div class="container">
    <div class="checkout-wrapper">
      <div class="top-content">
        <h2>Finalizar compra</h2>
        <ul class="list">
          <li><a href="{{ route('index') }}">Inicio</a></li>
          <li>Finalizar compra</li>
        </ul>
      </div>
      <form action="{{ route('finalize') }}" method="post">
        @csrf
        <div class="row g-4">
          <div class="col-lg-8">
            <div class="checkout-single-wrapper">
              <div class="checkout-single boxshado-single">
                <h4>Datos de facturación</h4>
                <div class="checkout-single-form">
                  <div class="row g-4">

                    {{-- Nombre --}}
                    <div class="col-lg-6">
                      <div class="input-single">
                        <span>Nombre *</span>
                        <input type="text" value="{{ auth()->user()->name }}" disabled>
                      </div>
                    </div>

                    {{-- Apellidos --}}
                    <div class="col-lg-6">
                      <div class="input-single">
                        <span>Apellidos *</span>
                        <input type="text" value="{{ auth()->user()->last_name }}" disabled>
                      </div>
                    </div>

                    {{-- DNI --}}
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>DNI *</span>
                        <input type="text" value="{{ auth()->user()->document }}" disabled>
                      </div>
                    </div>

                    {{-- Comprobante --}}
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Comprobante *</span>
                        <select class="form-select rounded-0" name="voucher" id="voucher_select">
                          <option value="">Seleccionar</option>
                          <option value="Boleta"  @if(old('voucher') == 'Boleta')  selected @endif>Boleta</option>
                          <option value="Factura" @if(old('voucher') == 'Factura') selected @endif>Factura</option>
                        </select>
                        @error('voucher')
                          <div class="text-danger small">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    {{-- Razón social + RUC (solo Factura) --}}
                    <div class="col-lg-12" id="factura_fields" style="{{ old('voucher') == 'Factura' ? '' : 'display:none;' }}">
                      <div class="row g-4">
                        <div class="col-lg-12">
                          <div class="input-single">
                            <span>Razón social</span>
                            <input type="text" name="bussiness_name" value="{{ old('bussiness_name') }}">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="input-single">
                            <span>RUC *</span>
                            <input type="text" name="bussiness_document" value="{{ old('bussiness_document') }}" maxlength="11">
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- Ciudad --}}
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Ciudad *</span>
                        <select class="form-select rounded-0" name="city" id="city_select">
                          <option value="">Seleccionar ciudad</option>
                          <option value="Chiclayo"   @if(old('city') == 'Chiclayo')   selected @endif>Chiclayo</option>
                          <option value="Lambayeque" @if(old('city') == 'Lambayeque') selected @endif>Lambayeque</option>
                          <option value="Monsefú"    @if(old('city') == 'Monsefú')    selected @endif>Monsefú</option>
                          <option value="Ferreñafe"  @if(old('city') == 'Ferreñafe')  selected @endif>Ferreñafe</option>
                        </select>
                        @error('city')
                          <div class="text-danger small">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    {{-- Dirección --}}
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Dirección *</span>
                        <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}">
                        @error('address')
                          <div class="text-danger small">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    {{-- Envío informativo --}}
                    <div class="col-lg-12">
                      <div class="input-single">
                        <span>Costo de envío</span>
                        <div class="p-3 rounded-2" style="background:#f3f3f3;border:1px solid #e0e0e0;font-size:.95rem;">
                          <div class="d-flex align-items-center" style="gap:10px;">
                            <span style="font-size:1.4rem;">🚚</span>
                            <div>
                              <strong>Envío a domicilio</strong>
                              <div class="text-muted small">Entrega en 3 a 5 días hábiles</div>
                            </div>
                            <div class="ms-auto">
                              <span id="shipping_price" style="font-weight:700;font-size:1.1rem;color:#333;">
                                @php
                                  $oc = old('city');
                                  echo ($oc == 'Chiclayo' || $oc == 'Lambayeque') ? 'S/ 10.00'
                                     : (($oc == 'Monsefú'  || $oc == 'Ferreñafe')  ? 'S/ 15.00' : '—');
                                @endphp
                              </span>
                            </div>
                          </div>
                          <div id="shipping_note" class="mt-2 small text-muted" style="{{ old('city') ? '' : 'display:none;' }}">
                            @php
                              $oc = old('city');
                              if ($oc == 'Chiclayo' || $oc == 'Lambayeque')
                                  echo 'Envío dentro de Chiclayo y Lambayeque: S/ 10.00';
                              elseif ($oc == 'Monsefú' || $oc == 'Ferreñafe')
                                  echo 'Envío a Monsefú / Ferreñafe: S/ 15.00';
                            @endphp
                          </div>
                          <div id="shipping_select_city" class="mt-2 small text-muted" style="{{ old('city') ? 'display:none;' : '' }}">
                            Selecciona tu ciudad para ver el costo de envío.
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- Hidden: delivery_id y shipping_cost calculado por JS --}}
                    <input type="hidden" name="delivery_id" id="delivery_id_input" value="{{ old('delivery_id', 2) }}">
                    <input type="hidden" name="shipping_cost" id="shipping_cost_input" value="{{ old('shipping_cost', 0) }}">

                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Resumen pedido --}}
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
                  <p>Subtotal productos</p>
                  <p>S/{{ number_format($total, 2) }}</p>
                </div>
                <div class="checkout-item d-flex align-items-center justify-content-between">
                  <p>Envío</p>
                  <p id="summary_shipping">
                    @php
                      $oc = old('city');
                      echo ($oc == 'Chiclayo' || $oc == 'Lambayeque') ? 'S/ 10.00'
                         : (($oc == 'Monsefú'  || $oc == 'Ferreñafe')  ? 'S/ 15.00' : '—');
                    @endphp
                  </p>
                </div>
                <div class="checkout-item d-flex align-items-center justify-content-between" style="border-top:2px solid #eee;padding-top:8px;margin-top:4px;">
                  <p><strong>Total</strong></p>
                  <p id="summary_total">
                    @php
                      $oc  = old('city');
                      $fee = ($oc == 'Chiclayo' || $oc == 'Lambayeque') ? 10
                           : (($oc == 'Monsefú'  || $oc == 'Ferreñafe')  ? 15 : null);
                    @endphp
                    <strong>{{ $fee !== null ? 'S/ '.number_format($total + $fee, 2) : '—' }}</strong>
                  </p>
                </div>

                <h3>Método de pago</h3>
                <div class="checkout-item-2">
                  @foreach($payment_methods as $payment_method)
                  <div class="form-check-2 d-flex align-items-center from-customradio-2">
                    <input class="form-check-input" type="radio" name="payment_method_id"
                      value="{{ $payment_method->id }}"
                      id="payment_method_{{ $payment_method->id }}"
                      @if(old('payment_method_id') == $payment_method->id) checked @endif>
                    <label class="form-check-label" for="payment_method_{{ $payment_method->id }}">
                      {{ $payment_method->name }}
                    </label>
                  </div>
                  @endforeach
                  @error('payment_method_id')
                    <div class="text-danger small">{{ $message }}</div>
                  @enderror
                </div>

                <button type="submit" class="theme-btn mt-4">Finalizar</button>
              </div>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
</section>

<script>
(function () {
    var subtotal = {{ $total }};

    // Precios por ciudad
    var cityPrices = {
        'Chiclayo':   10,
        'Lambayeque': 10,
        'Monsefú':    15,
        'Ferreñafe':  15
    };

    // IDs de delivery por ciudad (todos usan el mismo registro de envío a domicilio)
    var cityDelivery = {
        'Chiclayo':   2,
        'Lambayeque': 2,
        'Monsefú':    2,
        'Ferreñafe':  2
    };

    var citySelect       = document.getElementById('city_select');
    var voucherSelect    = document.getElementById('voucher_select');
    var facturaFields    = document.getElementById('factura_fields');
    var shippingPrice    = document.getElementById('shipping_price');
    var shippingNote     = document.getElementById('shipping_note');
    var shippingSelMsg   = document.getElementById('shipping_select_city');
    var summaryShipping  = document.getElementById('summary_shipping');
    var summaryTotal     = document.getElementById('summary_total');
    var deliveryIdInput  = document.getElementById('delivery_id_input');
    var shippingCostInput = document.getElementById('shipping_cost_input');

    // Notas por ciudad
    var cityNotes = {
        'Chiclayo':   'Envío dentro de Chiclayo y Lambayeque: S/ 10.00',
        'Lambayeque': 'Envío dentro de Chiclayo y Lambayeque: S/ 10.00',
        'Monsefú':    'Envío a Monsefú / Ferreñafe: S/ 15.00',
        'Ferreñafe':  'Envío a Monsefú / Ferreñafe: S/ 15.00'
    };

    function updateShipping() {
        var city = citySelect.value;
        var cost = cityPrices[city];

        if (cost !== undefined) {
            shippingPrice.textContent    = 'S/ ' + cost.toFixed(2);
            shippingNote.textContent     = cityNotes[city];
            shippingNote.style.display   = '';
            shippingSelMsg.style.display = 'none';
            summaryShipping.textContent  = 'S/ ' + cost.toFixed(2);
            summaryTotal.innerHTML       = '<strong>S/ ' + (subtotal + cost).toFixed(2) + '</strong>';
            deliveryIdInput.value        = cityDelivery[city];
            shippingCostInput.value      = cost;
        } else {
            shippingPrice.textContent    = '—';
            shippingNote.style.display   = 'none';
            shippingSelMsg.style.display = '';
            summaryShipping.textContent  = '—';
            summaryTotal.innerHTML       = '<strong>—</strong>';
            deliveryIdInput.value        = '';
            shippingCostInput.value      = 0;
        }
    }

    function toggleFactura() {
        facturaFields.style.display = voucherSelect.value === 'Factura' ? '' : 'none';
    }

    citySelect.addEventListener('change', updateShipping);
    voucherSelect.addEventListener('change', toggleFactura);

    // Ejecutar al cargar (por si hay valores de old())
    updateShipping();
    toggleFactura();
})();
</script>
@endsection
