@extends('template')

@section('content')
<!-- Page Banner -->
<div class="page-banner-area section-padding fix" style="background:#f9f5f2; padding: 60px 0 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-2">Contáctame</h2>
                <p class="text-muted">Atendemos pedidos en Chiclayo, Lambayeque, Ferreñafe y Monsefú. ¡Escríbenos!</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Contáctame</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section-padding fix">
    <div class="container">
        <div class="row g-5">

            <!-- Info de contacto -->
            <div class="col-lg-4">

                @php
                $info = [
                    [
                        'icon'   => 'fa-whatsapp fab',
                        'titulo' => 'WhatsApp',
                        'lineas' => ['', 'Lun – Sáb: 9:00 AM – 6:00 PM', 'Respuesta rápida por WhatsApp'],
                    ],
                    [
                        'icon'   => 'fa-envelope',
                        'titulo' => 'Correo Electrónico',
                        'lineas' => ['ecomas.boutique@gmail.com', 'Respuesta en máx. 24 horas hábiles'],
                    ],
                    [
                        'icon'   => 'fa-location-dot',
                        'titulo' => 'Zona de Despacho',
                        'lineas' => [
                            'Chiclayo — S/ 10.00',
                            'Lambayeque — S/ 15.00',
                            'Ferreñafe — S/ 15.00',
                            'Monsefú — S/ 15.00',
                        ],
                    ],
                    [
                        'icon'   => 'fa-clock',
                        'titulo' => 'Horario de Atención',
                        'lineas' => ['Lun – Vie: 9:00 AM – 6:00 PM', 'Sáb: 9:00 AM – 1:00 PM', 'Dom y feriados: Cerrado'],
                    ],
                ];
                @endphp

                @foreach($info as $item)
                <div class="mb-4 p-4" style="background:#fff; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,.07);">
                    <div class="d-flex align-items-center mb-2">
                        <div style="width:40px;height:40px;background:#c0392b;color:#fff;border-radius:50%;
                                    display:flex;align-items:center;justify-content:center;
                                    margin-right:14px;flex-shrink:0;">
                            <i class="{{ strpos($item['icon'],'fab') !== false ? $item['icon'] : 'fa-solid '.$item['icon'] }}"></i>
                        </div>
                        <h6 class="fw-bold mb-0">{{ $item['titulo'] }}</h6>
                    </div>
                    @foreach($item['lineas'] as $linea)
                        <p class="text-muted small mb-1 ps-1">{{ $linea }}</p>
                    @endforeach
                </div>
                @endforeach

                <!-- Redes sociales -->
                <div class="p-4" style="background:#fff; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,.07);">
                    <h6 class="fw-bold mb-3">Síguenos en redes</h6>
                    <div class="d-flex gap-2 flex-wrap">
                        @foreach([['fab fa-facebook-f','https://www.facebook.com/share/1CowSi4Sxq/'], ['fab fa-instagram','https://www.instagram.com/ecomasperu?igsh=Nmh1eGNvb3VjN245'], ['fab fa-whatsapp','https://wa.me/message/S2FZTYSUOOCAN1'], ['fab fa-tiktok','https://www.tiktok.com/@novamaquillajeboutique']] as $red)
                        <a href="{{ $red[1] }}" target="_blank"
                           style="width:40px;height:40px;background:#1a1a2e;color:#fff;border-radius:50%;
                                  display:flex;align-items:center;justify-content:center;text-decoration:none;">
                            <i class="{{ $red[0] }}"></i>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Formulario -->
            <div class="col-lg-8">
                <div style="background:#fff; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,.07); overflow:hidden;">

                    <div class="p-4" style="background:#1a1a2e;">
                        <h5 class="text-white mb-0">
                            <i class="fa-solid fa-paper-plane me-2"></i>Envíanos un mensaje
                        </h5>
                    </div>

                    @if(session('success'))
                    <div class="m-4 p-4 text-center" style="background:#d4edda; border-radius:10px;">
                        <i class="fa-solid fa-circle-check fa-2x mb-3" style="color:#27ae60; display:block;"></i>
                        <h5 class="fw-bold">¡Mensaje enviado!</h5>
                        <p class="text-muted mb-0">Gracias por contactarnos. Te responderemos en máximo 24 horas hábiles.</p>
                    </div>
                    @else
                    <div class="p-4">
                        <form action="{{ route('contactame.store') }}" method="POST">
                            @csrf

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nombre completo <span style="color:#c0392b;">*</span></label>
                                    <div class="form-clt">
                                        <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre completo">
                                    </div>
                                    @error('nombre')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Correo electrónico <span style="color:#c0392b;">*</span></label>
                                    <div class="form-clt">
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com">
                                    </div>
                                    @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Teléfono / Celular</label>
                                    <div class="form-clt">
                                        <input type="tel" name="telefono" value="{{ old('telefono') }}" placeholder="Ej: 987654321">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Ciudad <span style="color:#c0392b;">*</span></label>
                                    <div class="form-clt">
                                        <select name="ciudad" class="form-select rounded-0 py-3">
                                            <option value="">Selecciona tu ciudad...</option>
                                            @foreach(['Chiclayo','Lambayeque','Ferreñafe','Monsefú','Otra'] as $ciudad)
                                            <option value="{{ $ciudad }}" {{ old('ciudad') == $ciudad ? 'selected' : '' }}>
                                                {{ $ciudad }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('ciudad')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Asunto <span style="color:#c0392b;">*</span></label>
                                <div class="form-clt">
                                    <select name="asunto" class="form-select rounded-0 py-3">
                                        <option value="">Selecciona el motivo...</option>
                                        @foreach([
                                            'Consulta de producto',
                                            'Estado de mi pedido',
                                            'Cambio o devolución',
                                            'Consulta sobre envío a mi zona',
                                            'Problema con mi cuenta',
                                            'Facturación o pago',
                                            'Sugerencia',
                                            'Otro',
                                        ] as $motivo)
                                        <option value="{{ $motivo }}" {{ old('asunto') == $motivo ? 'selected' : '' }}>
                                            {{ $motivo }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('asunto')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Número de pedido (si aplica)</label>
                                <div class="form-clt">
                                    <input type="text" name="numero_pedido" value="{{ old('numero_pedido') }}" placeholder="Ej: B001-00000001">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Mensaje <span style="color:#c0392b;">*</span></label>
                                <div class="form-clt">
                                    <textarea name="mensaje" rows="5"
                                              placeholder="Describe tu consulta con el mayor detalle posible...">{{ old('mensaje') }}</textarea>
                                </div>
                                @error('mensaje')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>

                            <button type="submit" class="theme-btn">
                                <i class="fa-solid fa-paper-plane me-2"></i>Enviar Mensaje
                            </button>

                        </form>
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
