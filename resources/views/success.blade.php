@extends('template')

@section('content')
<section class="section-padding fix" style="background: #f8f8f8; min-height: 80vh;">
    <div class="container">

        {{-- Header --}}
        <div class="text-center mb-4">
            <div class="mb-3">
                <span style="display:inline-flex;align-items:center;justify-content:center;width:64px;height:64px;border-radius:50%;border:3px solid #b8860b;">
                    <i class="fa fa-check" style="color:#b8860b;font-size:28px;"></i>
                </span>
            </div>
            <h2 style="font-size:2rem;font-weight:700;color:#222;">¡Gracias por su compra!</h2>
            <p class="text-muted mb-4">Su pedido fue realizado correctamente</p>
            <a href="{{ session('voucher_url') }}" class="theme-btn d-inline-flex align-items-center" style="gap:8px;">
                <i class="fa fa-eye"></i>&nbsp; Ver comprobante
            </a>
        </div>

        {{-- Warning notice --}}
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <div class="d-flex align-items-start gap-3 p-4 rounded-3" style="background:#fffbea;border:1px solid #f0d060;">
                    <i class="fa fa-triangle-exclamation fa-lg mt-1" style="color:#e6a800;flex-shrink:0;"></i>
                    <div class="flex-grow-1">
                        <strong>Antes de realizar el pago</strong>
                        <p class="mb-0 text-muted small mt-1">
                            Verifica tu comprobante para ver el total de tu compra, incluyendo el costo de envío.
                            Asegúrate de pagar el monto exacto que aparece en tu comprobante.
                        </p>
                    </div>
                    <div class="text-center ms-3" style="flex-shrink:0;">
                        <div style="background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:10px 16px;min-width:110px;">
                            <div class="text-muted" style="font-size:11px;font-weight:600;letter-spacing:.5px;">TOTAL</div>
                            <div style="font-size:1.1rem;font-weight:700;color:#222;">S/ {{ number_format(session('order_total', 0), 2) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Payment instructions title --}}
        <div class="text-center mb-3">
            <h4 class="d-inline-flex align-items-center gap-2" style="font-weight:700;color:#222;">
                <i class="fa-regular fa-clock" style="color:#444;"></i>&nbsp;
                Instrucciones de pago
            </h4>
            <p class="text-muted small">Elige el método que más te convenga</p>
        </div>

        {{-- Payment method cards --}}
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <div class="row g-3">

                    {{-- Yape / Plin --}}
                    <div class="col-md-4">
                        <div class="h-100 p-4 rounded-3" style="border:1.5px solid #e0d4f5;background:#fff;">
                            <div class="d-flex align-items-center mb-3" style="gap:12px;">
                                <div style="width:48px;height:48px;border-radius:12px;background:#7b2d9e;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <span style="color:#fff;font-weight:800;font-size:13px;">S/.</span>
                                </div>
                                <strong style="color:#7b2d9e;font-size:1rem;">Yape / Plin</strong>
                            </div>
                            <p class="mb-1 small"><span class="text-muted">Número:</span> <strong style="color:#7b2d9e;">947 338 369</strong></p>
                            <p class="mb-3 small"><span class="text-muted">Titular:</span> <strong style="color:#7b2d9e;">Traecy Q.</strong></p>
                            <div class="rounded-2 p-2 small d-flex align-items-start" style="background:#f3eeff;gap:8px;">
                                <i class="fa-regular fa-circle-info mt-1" style="color:#7b2d9e;flex-shrink:0;"></i>
                                <span>Antes de pagar, verifica que el nombre coincida.</span>
                            </div>
                        </div>
                    </div>

                    {{-- Transferencia BCP --}}
                    <div class="col-md-4">
                        <div class="h-100 p-4 rounded-3" style="border:1.5px solid #d0e8ff;background:#fff;">
                            <div class="d-flex align-items-center mb-3" style="gap:12px;">
                                <div style="width:48px;height:48px;flex-shrink:0;">
                                    <svg viewBox="0 0 48 48" width="48" height="48" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4" y="28" width="40" height="5" rx="1" fill="#1a6bbf"/>
                                        <rect x="4" y="36" width="40" height="5" rx="1" fill="#1a6bbf"/>
                                        <rect x="6" y="18" width="5" height="11" rx="1" fill="#1a6bbf"/>
                                        <rect x="13" y="14" width="5" height="15" rx="1" fill="#1a6bbf"/>
                                        <rect x="20" y="10" width="5" height="19" rx="1" fill="#1a6bbf"/>
                                        <rect x="27" y="14" width="5" height="15" rx="1" fill="#1a6bbf"/>
                                        <rect x="34" y="18" width="5" height="11" rx="1" fill="#1a6bbf"/>
                                        <polygon points="24,2 6,12 42,12" fill="#1a6bbf"/>
                                    </svg>
                                </div>
                                <strong style="color:#1a6bbf;font-size:1rem;">Transferencia Bancaria (BCP)</strong>
                            </div>
                            <ul class="list-unstyled mb-0 small" style="line-height:2.1;">
                                <li><span class="text-muted">Titular:</span> <strong>Traecy Q.</strong></li>
                                <li><span class="text-muted">Banco:</span> <strong style="color:#1a6bbf;">BCP</strong></li>
                                <li><span class="text-muted">Tipo de cuenta:</span> <strong>Ahorros</strong></li>
                                <li><span class="text-muted">Moneda:</span> <strong>Soles (PEN)</strong></li>
                                <li><span class="text-muted">N° de cuenta:</span> <strong style="color:#1a6bbf;">1234567890</strong></li>
                            </ul>
                        </div>
                    </div>

                    {{-- Contraentrega --}}
                    <div class="col-md-4">
                        <div class="h-100 p-4 rounded-3" style="border:1.5px solid #c8edcc;background:#fff;">
                            <div class="d-flex align-items-center mb-3" style="gap:12px;">
                                <div style="font-size:2rem;">🚚</div>
                                <strong style="color:#2e7d32;font-size:1rem;">Contraentrega<br><small style="font-weight:400;">(Envíos a domicilio)</small></strong>
                            </div>
                            <p class="mb-0 small text-muted">Paga en efectivo al momento de recibir tu pedido.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Security notice --}}
        <div class="row justify-content-center mb-3">
            <div class="col-lg-10">
                <div class="d-flex align-items-center p-3 rounded-3" style="background:#eef4ff;border:1px solid #c5d9f5;gap:12px;">
                    <i class="fa fa-shield-halved" style="color:#1a6bbf;font-size:1.3rem;flex-shrink:0;"></i>
                    <p class="mb-0 small">
                        <strong style="color:#1a6bbf;">Por tu seguridad:</strong>
                        Confirma siempre que el nombre del titular sea <strong>Traecy Q.</strong> antes de realizar cualquier pago.
                    </p>
                </div>
            </div>
        </div>

        {{-- WhatsApp notice --}}
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background:#edfff0;border:1px solid #b2deb8;gap:12px;flex-wrap:wrap;">
                    <div class="d-flex align-items-start" style="gap:12px;">
                        <i class="fab fa-whatsapp" style="color:#25d366;font-size:1.6rem;flex-shrink:0;"></i>
                        <p class="mb-0 small">
                            <strong style="color:#25d366;">Importante:</strong>
                            Luego de realizar el pago, envíanos tu captura de pantalla por WhatsApp para confirmar tu pedido y brindarte mayor seguridad.
                        </p>
                    </div>
                    <a href="https://wa.me/message/S2FZTYSUOOCAN1" target="_blank"
                       class="btn btn-sm d-inline-flex align-items-center flex-shrink-0"
                       style="background:#25d366;color:#fff;border-radius:8px;padding:8px 16px;font-weight:600;white-space:nowrap;gap:6px;">
                        <i class="fab fa-whatsapp"></i> Abrir WhatsApp
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
