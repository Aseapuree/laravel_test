<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f6f6f6; color: #333; }
        .wrapper { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; }
        .header { background: #BD844C; padding: 30px 40px; text-align: center; }
        .header h1 { color: #fff; font-size: 22px; font-weight: bold; }
        .header p { color: rgba(255,255,255,0.85); font-size: 14px; margin-top: 6px; }
        .body { padding: 32px 40px; }
        .greeting { font-size: 16px; margin-bottom: 16px; }
        .info-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; font-size: 14px; }
        .info-row span:first-child { color: #888; }
        .info-row span:last-child { font-weight: bold; color: #333; }
        .section-title { font-size: 14px; font-weight: bold; color: #555; margin: 24px 0 12px; text-transform: uppercase; letter-spacing: 0.5px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        thead th { background: #f9f9f9; padding: 10px 12px; text-align: left; color: #555; font-weight: bold; border-bottom: 2px solid #eee; }
        tbody td { padding: 10px 12px; border-bottom: 1px solid #eee; }
        .text-right { text-align: right; }
        .totals { margin-top: 8px; }
        .totals tr td { border: none; padding: 5px 12px; font-size: 14px; }
        .totals .grand-total td { font-size: 16px; font-weight: bold; color: #BD844C; padding-top: 10px; border-top: 2px solid #eee; }
        .status-badge { display: inline-block; background: #FFF3CD; color: #856404; padding: 4px 14px; border-radius: 20px; font-size: 13px; font-weight: bold; }
        .footer { background: #f6f6f6; padding: 20px 40px; text-align: center; font-size: 12px; color: #aaa; border-top: 1px solid #eee; }
        .cta { text-align: center; margin: 28px 0 8px; }
        .cta a { background: #BD844C; color: #fff; padding: 12px 32px; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: bold; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>¡Gracias por tu compra!</h1>
        <p>Tu pedido fue registrado correctamente</p>
    </div>
    <div class="body">
        <p class="greeting">Hola <strong>{{ $sale->client->name }} {{ $sale->client->last_name }}</strong>,</p>
        <p style="font-size:14px; color:#666; margin-bottom:20px;">A continuación el resumen de tu pedido:</p>

        <div class="info-row">
            <span>Número de pedido</span>
            <span>{{ $sale->number }}</span>
        </div>
        <div class="info-row">
            <span>Estado</span>
            <span><span class="status-badge">{{ $sale->status }}</span></span>
        </div>
        <div class="info-row">
            <span>Fecha</span>
            <span>{{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y H:i') }}</span>
        </div>
        <div class="info-row">
            <span>Método de pago</span>
            <span>{{ $sale->payment_method->name }}</span>
        </div>
        <div class="info-row">
            <span>Envío</span>
            <span>{{ $sale->delivery->name }}</span>
        </div>
        <div class="info-row">
            <span>Dirección</span>
            <span>{{ $sale->address }}, {{ $sale->city }}</span>
        </div>

        <p class="section-title">Productos</p>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th class="text-right">Cant.</th>
                    <th class="text-right">Precio</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td class="text-right">{{ $detail->quantity }}</td>
                    <td class="text-right">S/ {{ number_format($detail->price, 2) }}</td>
                    <td class="text-right">S/ {{ number_format($detail->price * $detail->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="totals">
            <tr>
                <td class="text-right" style="color:#888;">Subtotal productos</td>
                <td class="text-right" style="width:120px;">S/ {{ number_format($sale->total - $sale->delivery->price, 2) }}</td>
            </tr>
            <tr>
                <td class="text-right" style="color:#888;">Costo de envío</td>
                <td class="text-right">S/ {{ number_format($sale->delivery->price, 2) }}</td>
            </tr>
            <tr class="grand-total">
                <td class="text-right">Total</td>
                <td class="text-right">S/ {{ number_format($sale->total, 2) }}</td>
            </tr>
        </table>

        <div class="cta">
            <a href="{{ route('orders') }}">Ver mis pedidos</a>
        </div>

        <p style="font-size:13px; color:#999; text-align:center; margin-top:16px;">
            Ante cualquier consulta contáctanos por WhatsApp o responde este correo.
        </p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Boutique. Todos los derechos reservados.
    </div>
</div>
</body>
</html>
