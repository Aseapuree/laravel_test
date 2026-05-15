@extends('template')

@section('content')
<!-- Page Banner -->
<div class="page-banner-area section-padding fix" style="background:#f9f5f2; padding: 60px 0 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-2">Cambios y Devoluciones</h2>
                <p class="text-muted">Tu satisfacción es nuestra prioridad. Proceso fácil y transparente.</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Cambios y Devoluciones</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section-padding fix">
    <div class="container">

        <!-- Pasos -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <h4 class="text-center fw-bold mb-4">¿Cómo solicitar un cambio o devolución?</h4>
                <div class="row g-4 text-center">
                    @php
                    $pasos = [
                        ['num' => '1', 'icon' => 'fa-whatsapp fab', 'titulo' => 'Contáctanos',     'desc' => 'Escríbenos por WhatsApp o correo dentro de los 15 días de recibido el producto.'],
                        ['num' => '2', 'icon' => 'fa-camera',       'titulo' => 'Adjunta evidencia','desc' => 'Envía fotos o video del producto y tu número de pedido.'],
                        ['num' => '3', 'icon' => 'fa-clipboard-check','titulo'=> 'Validación',      'desc' => 'Evaluamos tu caso en máximo 48 horas hábiles.'],
                        ['num' => '4', 'icon' => 'fa-box-open',      'titulo' => 'Solución',        'desc' => 'Coordinamos la recogida del producto en tu domicilio dentro de Lambayeque.'],
                    ];
                    @endphp
                    @foreach($pasos as $paso)
                    <div class="col-md-3">
                        <div style="width:60px;height:60px;background:#c0392b;color:#fff;border-radius:50%;
                                    display:flex;align-items:center;justify-content:center;
                                    font-size:1.3rem;font-weight:700;margin:0 auto 12px;">
                            {{ $paso['num'] }}
                        </div>
                        <i class="{{ strpos($paso['icon'],'fab') !== false ? $paso['icon'] : 'fa-solid '.$paso['icon'] }} fa-xl mb-2"
                           style="color:#c0392b;display:block;"></i>
                        <h6 class="fw-bold">{{ $paso['titulo'] }}</h6>
                        <p class="text-muted small">{{ $paso['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">

                @php
                $secciones = [
                    [
                        'titulo' => '1. Plazo para Devoluciones',
                        'tipo'   => 'texto',
                        'items'  => [
                            'Aceptamos solicitudes de cambio o devolución dentro de los 15 días calendario contados desde la fecha de recepción del producto, siempre que se cumplan las condiciones indicadas en esta política.',
                            'Para productos defectuosos, el plazo se extiende conforme a la garantía del fabricante o la Ley N° 29571 (Código de Protección al Consumidor).',
                        ],
                    ],
                    [
                        'titulo' => '2. Condiciones para Aceptar la Devolución',
                        'tipo'   => 'check',
                        'items'  => [
                            'Estar en su empaque original, sin señales de uso o daño.',
                            'Incluir todos los accesorios, manuales y documentos originales.',
                            'Presentar el comprobante de compra (boleta o factura).',
                            'No haber sido abierto ni utilizado (especialmente productos de belleza y cuidado personal).',
                        ],
                    ],
                    [
                        'titulo' => '3. Causas Válidas para Devolución',
                        'tipo'   => 'check',
                        'items'  => [
                            'Producto con defecto de fábrica o daño en el transporte.',
                            'Producto diferente al pedido (error en el despacho).',
                            'Producto que no corresponde a la descripción publicada.',
                            'Producto incompleto (faltan piezas o accesorios).',
                        ],
                    ],
                    [
                        'titulo' => '4. Causas NO Válidas para Devolución',
                        'tipo'   => 'error',
                        'items'  => [
                            'Arrepentimiento de compra sin defecto del producto.',
                            'Productos de belleza o cuidado personal que ya fueron abiertos o usados.',
                            'Daños causados por el cliente (mala manipulación, caídas, etc.).',
                            'Solicitudes fuera del plazo de 15 días.',
                        ],
                    ],
                    [
                        'titulo' => '5. Recojo del Producto',
                        'tipo'   => 'texto',
                        'items'  => [
                            'Una vez aprobada la devolución, coordinaremos el recojo del producto directamente en tu domicilio dentro de las ciudades de Chiclayo, Lambayeque, Ferreñafe o Monsefú, sin costo adicional para ti cuando el motivo sea un defecto o error de nuestra parte.',
                            'Si la devolución es por otros motivos aceptados dentro del plazo, el costo del recojo equivale al costo de envío de tu zona (S/ 10.00 para Chiclayo, S/ 15.00 para el resto).',
                        ],
                    ],
                    [
                        'titulo' => '6. Proceso de Reembolso',
                        'tipo'   => 'check',
                        'items'  => [
                            'Transferencia bancaria o Yape/Plin: depósito en un plazo de 1 a 3 días hábiles tras la recepción del producto devuelto.',
                            'Crédito en tienda: disponible de inmediato para futuras compras.',
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
                        @if($seccion['tipo'] === 'texto')
                            <p class="text-muted" style="line-height:1.8;">{{ $item }}</p>
                        @elseif($seccion['tipo'] === 'check')
                            <p class="text-muted mb-2">
                                <i class="fa-solid fa-circle-check me-2" style="color:#27ae60;"></i>{{ $item }}
                            </p>
                        @else
                            <p class="text-muted mb-2">
                                <i class="fa-solid fa-circle-xmark me-2" style="color:#c0392b;"></i>{{ $item }}
                            </p>
                        @endif
                    @endforeach
                </div>
                @endforeach

                <div class="text-center mt-5 p-4" style="background:#1a1a2e; border-radius:10px;">
                    <h5 class="text-white fw-bold mb-2">¿Listo para iniciar tu solicitud?</h5>
                    <p class="mb-3" style="color:rgba(255,255,255,.6);">
                        Escríbenos por WhatsApp o usa el formulario de contacto.
                    </p>
                    <a href="{{ route('contactame') }}" class="theme-btn">Contactar Soporte</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
