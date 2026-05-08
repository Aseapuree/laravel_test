@extends('template')

@section('content')
<!-- Page Banner -->
<div class="page-banner-area section-padding fix" style="background:#f9f5f2; padding: 60px 0 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-2">Política de Cookies</h2>
                <p class="text-muted">Última actualización: enero 2026</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Política de Cookies</li>
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

                <div class="alert" style="background:#f9f5f2; border-left:4px solid #c0392b; padding:16px 20px; border-radius:6px; margin-bottom:32px;">
                    <i class="fa-solid fa-circle-info me-2"></i>
                    Al continuar navegando en el sitio web de <strong>Boutique Ecomas</strong>, aceptas el uso de cookies conforme a esta política. Puedes configurar tu navegador para desactivarlas, aunque esto puede afectar la funcionalidad del sitio.
                </div>

                <!-- Tipos de cookies -->
                <h5 class="mb-4" style="border-left:4px solid #c0392b; padding-left:14px; font-weight:700;">Tipos de Cookies que Usamos</h5>
                <div class="row g-4 mb-5">
                    @php
                    $tipos = [
                        ['icon' => 'fa-gear', 'nombre' => 'Cookies Técnicas / Esenciales', 'badge' => 'Necesaria', 'badge_color' => '#27ae60', 'desc' => 'Necesarias para el funcionamiento del sitio. Permiten navegar, usar el carrito de compras y acceder a áreas seguras. Sin estas cookies, el sitio no puede funcionar correctamente.'],
                        ['icon' => 'fa-chart-bar', 'nombre' => 'Cookies Analíticas', 'badge' => 'Opcional', 'badge_color' => '#7f8c8d', 'desc' => 'Nos ayudan a entender cómo los usuarios interactúan con el sitio (páginas visitadas, tiempo de sesión, errores). Usamos esta información para mejorar la experiencia.'],
                        ['icon' => 'fa-sliders', 'nombre' => 'Cookies de Personalización', 'badge' => 'Opcional', 'badge_color' => '#7f8c8d', 'desc' => 'Permiten recordar tus preferencias (idioma, región, últimos productos vistos) para ofrecerte una experiencia más personalizada en futuras visitas.'],
                        ['icon' => 'fa-bullhorn', 'nombre' => 'Cookies de Marketing', 'badge' => 'Opcional', 'badge_color' => '#7f8c8d', 'desc' => 'Utilizadas para mostrarte publicidad relevante en nuestro sitio y en plataformas de terceros, en función de tus intereses y comportamiento de navegación.'],
                    ];
                    @endphp
                    @foreach($tipos as $tipo)
                    <div class="col-md-6">
                        <div class="p-4" style="background:#fff; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,.07); height:100%;">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-solid {{ $tipo['icon'] }} fa-xl me-3" style="color:#c0392b;"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $tipo['nombre'] }}</h6>
                                    <span style="background:{{ $tipo['badge_color'] }};color:#fff;padding:2px 10px;border-radius:20px;font-size:.75rem;">{{ $tipo['badge'] }}</span>
                                </div>
                            </div>
                            <p class="text-muted small mb-0">{{ $tipo['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                @php
                $secciones = [
                    ['titulo' => '¿Qué son las Cookies?', 'items' => [
                        'Las cookies son pequeños archivos de texto que un sitio web almacena en tu dispositivo cuando lo visitas. Contienen información que el sitio puede recuperar en visitas posteriores para recordar tus preferencias y mejorar tu experiencia.',
                        'Las cookies no son virus ni programas maliciosos. Son archivos inofensivos que facilitan la navegación y el funcionamiento de los sitios web.',
                    ]],
                    ['titulo' => 'Cookies de Terceros', 'items' => [
                        'Boutique Ecomas puede utilizar servicios de terceros (como Google Analytics) que también instalan cookies en tu dispositivo para medir el rendimiento de nuestras campañas y analizar el tráfico del sitio.',
                        'Estos terceros tienen sus propias políticas de privacidad y cookies, sobre las cuales Boutique Ecomas no tiene control directo.',
                    ]],
                    ['titulo' => 'Cómo Gestionar o Desactivar las Cookies', 'items' => [
                        'Puedes configurar tu navegador para aceptar, rechazar o eliminar cookies en cualquier momento. Ten en cuenta que desactivar las cookies técnicas puede impedir el correcto funcionamiento del carrito de compras, el inicio de sesión y otras funciones esenciales.',
                        'Chrome → Configuración > Privacidad y seguridad > Cookies.',
                        'Firefox → Opciones > Privacidad y seguridad.',
                        'Safari → Preferencias > Privacidad.',
                        'Edge → Configuración > Privacidad, búsqueda y servicios.',
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

                <div class="text-center mt-5 p-4" style="background:#1a1a2e; border-radius:10px;">
                    <h5 class="text-white fw-bold mb-2">¿Tienes dudas sobre el uso de cookies?</h5>
                    <p class="mb-3" style="color:rgba(255,255,255,.6);">Contáctanos y te orientamos con gusto.</p>
                    <a href="{{ route('contactame') }}" class="theme-btn">Contáctanos</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
