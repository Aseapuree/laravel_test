@extends('template')

@section('content')
<!-- Page Banner -->
<div class="page-banner-area section-padding fix" style="background:#f9f5f2; padding: 60px 0 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-2">Políticas de Envío</h2>
                <p class="text-muted">Realizamos envíos dentro de la región Lambayeque, Perú.</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Políticas de Envío</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section-padding fix">
    <div class="container">

        <!-- Aviso de cobertura -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-9">
                <div class="d-flex align-items-start p-4" style="background:#fff3cd; border-left:4px solid #f5a623; border-radius:6px;">
                    <i class="fa-solid fa-location-dot fa-lg me-3 mt-1" style="color:#c0392b; flex-shrink:0;"></i>
                    <div>
                        <strong>Cobertura de despacho:</strong> Actualmente realizamos envíos únicamente dentro de la
                        <strong>región Lambayeque</strong>. Atendemos los distritos de
                        <strong>Chiclayo, Lambayeque, Ferreñafe y Monsefú</strong>.
                        Si tienes dudas sobre si llegamos a tu zona, <a href="{{ route('contactame') }}" style="color:#c0392b;">contáctanos</a>.
                    </div>
                </div>
            </div>
        </div>

        <!-- Zonas y tarifas -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <h4 class="text-center fw-bold mb-4">Zonas y Tarifas de Entrega</h4>
                <div class="row g-4 justify-content-center">

                    @php
                    $zonas = [
                        [
                            'icon'   => 'fa-building',
                            'nombre' => 'Chiclayo',
                            'desc'   => 'Todos los distritos de la ciudad de Chiclayo.',
                            'tiempo' => '1 día hábil',
                            'costo'  => 'S/ 10.00',
                            'highlight' => true,
                        ],
                        [
                            'icon'   => 'fa-map-location-dot',
                            'nombre' => 'Lambayeque',
                            'desc'   => 'Ciudad de Lambayeque y sus alrededores.',
                            'tiempo' => '1 a 2 días hábiles',
                            'costo'  => 'S/ 15.00',
                            'highlight' => false,
                        ],
                        [
                            'icon'   => 'fa-city',
                            'nombre' => 'Ferreñafe',
                            'desc'   => 'Ciudad de Ferreñafe y zonas cercanas.',
                            'tiempo' => '1 a 2 días hábiles',
                            'costo'  => 'S/ 15.00',
                            'highlight' => false,
                        ],
                        [
                            'icon'   => 'fa-house-flag',
                            'nombre' => 'Monsefú',
                            'desc'   => 'Ciudad de Monsefú y alrededores.',
                            'tiempo' => '1 a 2 días hábiles',
                            'costo'  => 'S/ 15.00',
                            'highlight' => false,
                        ],
                    ];
                    @endphp

                    @foreach($zonas as $zona)
                    <div class="col-md-6 col-lg-3">
                        <div class="text-center p-4 h-100"
                             style="background:#fff; border-radius:12px;
                                    box-shadow:0 4px 15px rgba(0,0,0,.07);
                                    {{ $zona['highlight'] ? 'border:2px solid #c0392b;' : '' }}">
                            @if($zona['highlight'])
                            <span style="background:#c0392b;color:#fff;font-size:.72rem;padding:3px 10px;border-radius:20px;display:inline-block;margin-bottom:10px;">
                                Más solicitado
                            </span>
                            @endif
                            <i class="fa-solid {{ $zona['icon'] }} fa-2x mb-3 d-block" style="color:#c0392b;"></i>
                            <h6 class="fw-bold mb-1">{{ $zona['nombre'] }}</h6>
                            <p class="text-muted small mb-2">{{ $zona['desc'] }}</p>
                            <p class="small mb-1"><i class="fa-regular fa-clock me-1"></i><strong>{{ $zona['tiempo'] }}</strong></p>
                            <span style="background:#1a1a2e;color:#fff;padding:5px 16px;border-radius:20px;font-size:.85rem;font-weight:600;">
                                {{ $zona['costo'] }}
                            </span>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Nota de envío gratis -->
                <div class="text-center mt-4 p-3" style="background:#f9f5f2; border-radius:8px;">
                    <i class="fa-solid fa-truck-fast me-2" style="color:#c0392b;"></i>
                    <strong>Envío gratuito</strong> en pedidos iguales o superiores a <strong>S/ 150.00</strong> dentro de Chiclayo.
                    Para los demás distritos, envío gratis desde <strong>S/ 200.00</strong>.
                </div>
            </div>
        </div>

        <!-- Secciones de política -->
        <div class="row justify-content-center">
            <div class="col-lg-9">

                @php
                $secciones = [
                    [
                        'titulo' => '1. Zona de Cobertura',
                        'items'  => [
                            'Boutique Ecomas realiza despachos exclusivamente dentro de la región Lambayeque, Perú. Las ciudades atendidas son: Chiclayo, Lambayeque, Ferreñafe y Monsefú.',
                            'Si tu dirección de entrega se encuentra fuera de estas zonas, el pedido no podrá ser despachado. Te recomendamos contactarnos antes de realizar tu compra para verificar la cobertura.',
                        ],
                    ],
                    [
                        'titulo' => '2. Tarifas de Envío',
                        'items'  => [
                            'Chiclayo: S/ 10.00 por pedido, independientemente de la cantidad de productos.',
                            'Lambayeque, Ferreñafe y Monsefú: S/ 15.00 por pedido (S/ 5.00 adicionales respecto a Chiclayo).',
                            'Envío gratuito en Chiclayo para pedidos iguales o superiores a S/ 150.00.',
                            'Envío gratuito en Lambayeque, Ferreñafe y Monsefú para pedidos iguales o superiores a S/ 200.00.',
                        ],
                    ],
                    [
                        'titulo' => '3. Procesamiento del Pedido',
                        'items'  => [
                            'Los pedidos realizados de lunes a sábado antes de las 2:00 PM son procesados el mismo día. Los pedidos realizados después de las 2:00 PM o los domingos serán procesados al siguiente día hábil.',
                            'Recibirás una confirmación por correo electrónico o WhatsApp con los detalles de tu pedido una vez confirmado el pago.',
                        ],
                    ],
                    [
                        'titulo' => '4. Seguimiento del Pedido',
                        'items'  => [
                            'Una vez que tu pedido sea despachado, te notificaremos por WhatsApp o correo electrónico con el estado de tu entrega.',
                            'También puedes consultar el estado de tu pedido desde la sección "Mis Pedidos" en tu cuenta.',
                        ],
                    ],
                    [
                        'titulo' => '5. Dirección de Entrega',
                        'items'  => [
                            'Es responsabilidad del cliente ingresar una dirección de entrega correcta, completa y dentro de la zona de cobertura. Boutique Ecomas no se hace responsable por demoras o la imposibilidad de entrega derivadas de datos incorrectos o direcciones fuera de cobertura.',
                            'Si necesitas modificar la dirección de entrega, contáctanos dentro de las 2 horas siguientes a la confirmación del pedido, siempre que este no haya sido despachado aún.',
                        ],
                    ],
                    [
                        'titulo' => '6. Productos Dañados en Tránsito',
                        'items'  => [
                            'Si recibes un producto con señales de daño en el embalaje, debes fotografiarlo antes de abrirlo y comunicarte con nosotros dentro de las 24 horas posteriores a la entrega.',
                            'Gestionaremos el reemplazo o reembolso sin costo adicional para ti en caso de que el daño sea responsabilidad del proceso de envío.',
                        ],
                    ],
                ];
                @endphp

                @foreach($secciones as $seccion)
                <div class="mb-5">
                    <h5 class="mb-3" style="border-left:4px solid #c0392b; padding-left:14px; font-weight:700;">
                        {{ $seccion['titulo'] }}
                    </h5>
                    @foreach($seccion['items'] as $item)
                        <p class="text-muted" style="line-height:1.8;">{{ $item }}</p>
                    @endforeach
                </div>
                @endforeach

                <div class="text-center mt-5 p-4" style="background:#1a1a2e; border-radius:10px;">
                    <h5 class="text-white fw-bold mb-2">¿Preguntas sobre tu envío?</h5>
                    <p class="mb-3" style="color:rgba(255,255,255,.6);">
                        Escríbenos por WhatsApp al o usa el formulario de contacto.
                    </p>
                    <a href="{{ route('contactame') }}" class="theme-btn">Contactar Soporte</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
