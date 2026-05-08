@extends('template')

@section('content')
<!-- Page Banner -->
<div class="page-banner-area section-padding fix" style="background:#f9f5f2; padding: 60px 0 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-2">Política de Privacidad</h2>
                <p class="text-muted">Conforme a la Ley N° 29733 — Ley de Protección de Datos Personales del Perú</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Política de Privacidad</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section-padding fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <!-- Cards resumen -->
                <div class="row g-4 mb-5">
                    @php
                    $resumen = [
                        ['icon' => 'fa-lock', 'titulo' => 'Datos Seguros', 'desc' => 'Tu información es tratada con estrictas medidas de seguridad y cifrado SSL.'],
                        ['icon' => 'fa-eye-slash', 'titulo' => 'Sin Venta de Datos', 'desc' => 'Nunca vendemos ni cedemos tus datos personales a terceros no autorizados.'],
                        ['icon' => 'fa-user-shield', 'titulo' => 'Tú tienes el control', 'desc' => 'Puedes acceder, rectificar o solicitar la eliminación de tus datos en cualquier momento.'],
                    ];
                    @endphp
                    @foreach($resumen as $card)
                    <div class="col-md-4">
                        <div class="text-center p-4" style="background:#fff; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,.07); height:100%;">
                            <i class="fa-solid {{ $card['icon'] }} fa-2x mb-3" style="color:#c0392b;"></i>
                            <h6 class="fw-bold mb-2">{{ $card['titulo'] }}</h6>
                            <p class="text-muted small mb-0">{{ $card['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                @php
                $secciones = [
                    ['titulo' => '1. Responsable del Tratamiento', 'items' => [
                        'Boutique Ecomas, empresa peruana con domicilio en Chiclayo, Perú, es responsable del tratamiento de los datos personales recabados a través de este sitio web, conforme a la Ley N° 29733 y su Reglamento.',
                    ]],
                    ['titulo' => '2. Datos que Recopilamos', 'items' => [
                        'Datos de identificación: nombre, apellidos, DNI/CE/Pasaporte.',
                        'Datos de contacto: correo electrónico, teléfono, dirección de entrega.',
                        'Datos de transacción: historial de compras y métodos de pago (no almacenamos datos de tarjetas).',
                        'Datos de navegación: dirección IP, cookies y páginas visitadas.',
                    ]],
                    ['titulo' => '3. Finalidades del Tratamiento', 'items' => [
                        'Gestionar y procesar tus pedidos y pagos.',
                        'Enviar confirmaciones de compra y actualizaciones de entrega.',
                        'Atender consultas, reclamos y solicitudes de soporte.',
                        'Mejorar nuestros servicios y experiencia de usuario.',
                        'Cumplir con obligaciones legales y regulatorias.',
                        'Enviarte comunicaciones comerciales (solo si lo autorizaste).',
                    ]],
                    ['titulo' => '4. Compartición de Datos', 'items' => [
                        'Boutique Ecomas no vende ni cede datos personales a terceros con fines comerciales. Podemos compartir datos únicamente con:',
                        '— Empresas de transporte y logística para la entrega de pedidos.',
                        '— Pasarelas de pago certificadas (PCI-DSS) para procesar transacciones.',
                        '— Autoridades competentes cuando lo exija la ley peruana.',
                    ]],
                    ['titulo' => '5. Derechos del Titular (Derechos ARCO)', 'items' => [
                        'Conforme a la Ley N° 29733, tienes derecho a:',
                        '— Acceso: conocer qué datos tuyos tenemos y cómo los usamos.',
                        '— Rectificación: corregir datos inexactos o incompletos.',
                        '— Cancelación: solicitar la eliminación de tus datos cuando ya no sean necesarios.',
                        '— Oposición: oponerte al tratamiento de tus datos en determinadas circunstancias.',
                    ]],
                    ['titulo' => '6. Seguridad de los Datos', 'items' => [
                        'Boutique Ecomas implementa medidas técnicas y organizativas apropiadas para proteger tus datos personales, incluyendo cifrado SSL/TLS, control de accesos y revisiones periódicas de seguridad.',
                    ]],
                    ['titulo' => '7. Conservación de Datos', 'items' => [
                        'Los datos se conservan durante el tiempo necesario para cumplir la finalidad para la que fueron recabados. Los datos de compras se conservan por un mínimo de 5 años conforme a la normativa tributaria peruana.',
                    ]],
                ];
                @endphp

                @foreach($secciones as $seccion)
                <div class="mb-5">
                    <h5 class="mb-3" style="border-left:4px solid #c0392b; padding-left:14px; font-weight:700;">{{ $seccion['titulo'] }}</h5>
                    @foreach($seccion['items'] as $parrafo)
                        <p class="text-muted" style="line-height:1.8;">{{ $parrafo }}</p>
                    @endforeach
                </div>
                @endforeach

                <div class="text-center mt-5 p-4" style="background:#f9f5f2; border-radius:10px;">
                    <p class="fw-semibold mb-1">Para ejercer tus derechos ARCO</p>
                    <p class="text-muted small mb-3">Contáctanos indicando "Derechos ARCO" en el asunto del mensaje.</p>
                    <a href="{{ route('contactame') }}" class="theme-btn">Ejercer mis derechos</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
