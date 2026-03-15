@extends('template')

@section('content')
 <section class="Error-section section-padding fix">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-9">
                <div class="error-items">
                    <h2>
                        Gracias por su compra
                    </h2>
                    <p>Su pedido fue realizado correcamente</p>
                    <a href="{{ session('voucher_url') }}" class="theme-btn">
                        Ver comprobante
                    </a>
                </div>
            </div>
        </div>
        <div>
            <h3 class="mb-4">Instrucciones de pago</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    Efectivo: Paga al momento de la entrega en compras en tienda.
                </li>
                <li class="list-group-item">
                    Transferencia: Transfiera al número de cuenta BCP número 1234567890.
                </li>
                <li class="list-group-item">
                    Contraentrega: Paga al momento de la entrega en envío a domicilio.
                </li>
                <li class="list-group-item">
                    Pago con QR: Pague a través de Yape o Plin al siguiente número 999999999.
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection