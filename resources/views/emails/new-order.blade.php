<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f6f6f6; color: #333; }
        .wrapper { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; }
        .header { background: #010F1C; padding: 30px 40px; text-align: center; }
        .header h1 { color: #fff; font-size: 22px; font-weight: bold; }
        .header p { color: rgba(255,255,255,0.6); font-size: 14px; margin-top: 6px; }
        .body { padding: 32px 40px; }
        .alert { background: #FFF3CD; border-left: 4px solid #BD844C; padding: 12px 16px; border-radius: 4px; font-size: 14px; margin-bottom: 24px; color: #856404; }
        .grid { display: table; width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        .grid-row { display: table-row; }
        .grid-cell { display: table-cell; width: 50%; padding: 10px 12px; border: 1px solid #eee; font-size: 13px; vertical-align: top; }
        .grid-cell .label { color: #999; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        .grid-cell .value { font-weight: bold; color: #333; }
        .section-title { font-size: 13px; font-weight: bold; color: #555; margin: 0 0 12px; text-transform: uppercase; letter-spacing: 0.5px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        thead th { background: #f9f9f9; padding: 10px 12px; text-align: left; color: #555; font-weight: bold; border-bottom: 2px solid #eee; }
        tbody td { padding: 10px 12px; border-bottom: 1px solid #eee; }
        .text-right { text-align: right; }
        .totals tr td { border: none; padding: 5px 12px; font-size: 14px; }
        .totals .grand-total td { font-size: 16px; font-weight: bold; color: #010F1C; padding-top: 10px; border-top: 2px solid #eee; }
        .cta { text-align: center; margin: 28px 0 8px; }
        .cta a { background: #010F1C; color: #fff; padding: 12px 32px; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: bold; }
        .footer { background: #f6f6f6; padding: 20px 40px; text-align: center; font-size: 12px; color: #aaa; border-top: 1px solid #eee; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Nueva venta recibida</h1>
        <p>Panel administrativo — Boutique</p>
    </div>
    <div class="body">
        <div class="alert">
            Pedido <strong>#{{ $sale->number }}</strong> registrado el {{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($sale->date)->format('H:i') }}
        </div>

        <p class="section-title">Datos del cliente</p>
        <table class="grid" style="margin-bottom:24px;">
            <tr>
                <td class="grid-cell">
                    <div class="label">Nombre</div>
                    <div class="value">{{ $sale->client->name }} {{ $sale->client->last_name }}</div>
                </td>
                <td class="grid-cell">
                    <div class="label">Email</div>
                    <div class="value">{{ $sale->client->email }}</div>
                </td>
            </tr>
            <tr>
                <td class="grid-cell">
                    <div class="label">Teléfono</div>
                    <div class="value">{{ $sale->client->phone ?? '—' }}</div>
                </td>
                <td class="grid-cell">
                    <div class="label">Documento</div>
                    <div class="value">{{ $sale->client->document ?? '—' }}</div>
                </td>
            </tr>
            <tr>
                <td class="grid-cell">
                    <div class="label">Ciudad</div>
                    <div class="value">{{ $sale->city }}</div>
                </td>
                <td class="grid-cell">
                    <div class="label">Dirección</div>
                    <div class="value">{{ $sale->address }}</div>
                </td>
            </tr>
            <tr>
                <td class="grid-cell">
                    <div class="label">Método de pago</div>
                    <div class="value">{{ $sale->payment_method->name }}</div>
                </td>
                <td class="grid-cell">
                    <div class="label">Tipo de envío</div>
                    <div class="value">{{ $sale->delivery->name }}</div>
                </td>
            </tr>
            <tr>
                <td class="grid-cell">
                    <div class="label">Comprobante</div>
                    <div class="value">{{ $sale->voucher }}</div>
                </td>
                <td class="grid-cell">
                    <div class="label">Estado</div>
                    <div class="value">{{ $sale->status }}</div>
                </td>
            </tr>
        </table>

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
            <a href="{{ config('app.url') }}/admin/sales/{{ $sale->id }}/edit">Gestionar pedido</a>
        </div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Boutique — Panel Administrativo
    </div>
</div>
</body>
</html>
