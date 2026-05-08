@extends('template')

@section('content')
<!-- Page Banner -->
<div class="page-banner-area section-padding fix" style="background:#f9f5f2; padding: 60px 0 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-2">Términos y Condiciones</h2>
                <p class="text-muted">Última actualización: enero 2026</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Términos y Condiciones</li>
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

                <div class="d-flex align-items-start p-4 mb-5"
                     style="background:#fff3cd; border-left:4px solid #f5a623; border-radius:6px;">
                    <i class="fa-solid fa-circle-info fa-lg me-3 mt-1" style="color:#c0392b; flex-shrink:0;"></i>
                    <div>
                        Al acceder y utilizar el sitio web de <strong>Boutique Ecomas</strong>, aceptas plenamente
                        los presentes Términos y Condiciones. Ten en cuenta que nuestros servicios de despacho
                        operan <strong>únicamente dentro de la región Lambayeque</strong>
                        (Chiclayo, Lambayeque, Ferreñafe y Monsefú).
                    </div>
                </div>

                @php
                $secciones = [
                    [
                        'titulo' => '1. Aceptación de los Términos',
                        'items'  => [
                            'Al ingresar, navegar o realizar cualquier compra en el sitio web de Boutique Ecomas, el usuario declara haber leído, entendido y aceptado los presentes Términos y Condiciones.',
                            'Boutique Ecomas se reserva el derecho de modificar estos términos en cualquier momento. Los cambios entrarán en vigor desde su publicación en el sitio web.',
                        ],
                    ],
                    [
                        'titulo' => '2. Uso del Sitio Web',
                        'items'  => [
                            'El usuario se compromete a utilizar el sitio web de forma lícita y conforme a la normativa peruana vigente.',
                            'Queda prohibido usar el sitio con fines fraudulentos, intentar acceder sin autorización a sistemas o datos del sitio, publicar contenido falso o difamatorio, y realizar actividades que dañen la reputación de Boutique Ecomas.',
                        ],
                    ],
                    [
                        'titulo' => '3. Registro de Usuario',
                        'items'  => [
                            'Para acceder a ciertas funciones (como realizar compras o ver historial de pedidos), el usuario debe registrarse con datos verídicos y mantenerlos actualizados.',
                            'El usuario es responsable de mantener la confidencialidad de su contraseña. Boutique Ecomas no se hace responsable por accesos no autorizados derivados de negligencia del usuario.',
                        ],
                    ],
                    [
                        'titulo' => '4. Precios y Disponibilidad',
                        'items'  => [
                            'Los precios mostrados están expresados en Soles Peruanos (S/) e incluyen el IGV (18%) salvo indicación contraria.',
                            'Boutique Ecomas se reserva el derecho de modificar los precios en cualquier momento. Los pedidos confirmados respetarán el precio vigente al momento de la compra.',
                            'La disponibilidad de productos está sujeta al stock existente. En caso de falta de stock tras la confirmación, se comunicará al cliente y se ofrecerán alternativas o reembolso.',
                        ],
                    ],
                    [
                        'titulo' => '5. Cobertura de Envío',
                        'items'  => [
                            'Boutique Ecomas realiza despachos exclusivamente dentro de la región Lambayeque, Perú, en las ciudades de Chiclayo, Lambayeque, Ferreñafe y Monsefú.',
                            'El costo de envío a Chiclayo es de S/ 10.00 y a Lambayeque, Ferreñafe y Monsefú es de S/ 15.00. Estos valores pueden variar; consulta la sección de Políticas de Envío para información actualizada.',
                            'No se aceptarán pedidos con dirección de entrega fuera de las zonas indicadas. Si un pedido es confirmado con una dirección fuera de cobertura por error del sistema, se contactará al cliente para cancelar o coordinar una alternativa.',
                        ],
                    ],
                    [
                        'titulo' => '6. Proceso de Compra',
                        'items'  => [
                            'La confirmación de un pedido implica la aceptación del precio, las características del producto y las condiciones de entrega.',
                            'Boutique Ecomas se reserva el derecho de cancelar pedidos en caso de error en el precio publicado, fraude detectado, dirección fuera de cobertura o imposibilidad de entrega.',
                        ],
                    ],
                    [
                        'titulo' => '7. Propiedad Intelectual',
                        'items'  => [
                            'Todo el contenido del sitio web (textos, imágenes, logotipos, código fuente) es propiedad exclusiva de Boutique Ecomas o de sus licenciantes, protegido por las leyes peruanas de propiedad intelectual.',
                            'Queda prohibida la reproducción, distribución o uso comercial de cualquier contenido sin autorización expresa y por escrito.',
                        ],
                    ],
                    [
                        'titulo' => '8. Ley Aplicable y Jurisdicción',
                        'items'  => [
                            'Los presentes Términos y Condiciones se rigen por las leyes de la República del Perú. Cualquier controversia será sometida a los Juzgados y Tribunales competentes de la ciudad de Chiclayo, Lambayeque, Perú.',
                            'Para consultas o reclamos, el usuario puede acudir al Instituto Nacional de Defensa de la Competencia y de la Protección de la Propiedad Intelectual (INDECOPI), sede Lambayeque.',
                        ],
                    ],
                ];
                @endphp

                @foreach($secciones as $seccion)
                <div class="mb-5">
                    <h5 class="mb-3" style="border-left:4px solid #c0392b; padding-left:14px; font-weight:700;">
                        {{ $seccion['titulo'] }}
                    </h5>
                    @foreach($seccion['items'] as $parrafo)
                        <p class="text-muted" style="line-height:1.8;">{{ $parrafo }}</p>
                    @endforeach
                </div>
                @endforeach

                <div class="text-center mt-5 p-4" style="background:#f9f5f2; border-radius:10px;">
                    <p class="mb-3 text-muted">¿Tienes dudas sobre nuestros términos?</p>
                    <a href="{{ route('contactame') }}" class="theme-btn">Contáctanos</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
