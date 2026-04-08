<?php

namespace App\Mail;

use App\Models\Sale;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Sale $sale) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación de pedido #' . $this->sale->number,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-confirmation',
        );
    }

    public function attachments(): array
    {
        $sale     = $this->sale;
        $filename = $sale->voucher . '_' . $sale->number . '.pdf';
        $pdf      = $this->generatePdf($sale);

        return [
            Attachment::fromData(fn () => $pdf, $filename)
                ->withMime('application/pdf'),
        ];
    }

    private function generatePdf(Sale $sale): string
    {
        $fpdf = new Fpdf();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', 'B', 12);

        $fpdf->Cell(40, 10);
        $fpdf->Cell(90, 10, 'BOUTIQUE', 0, 0, 'C');

        if ($sale->voucher == 'Boleta') {
            $fpdf->MultiCell(60, 6, utf8_decode('BOLETA DE VENTA ELECTRÓNICA ' . $sale->number), 1, 'C');
        } elseif ($sale->voucher == 'Factura') {
            $fpdf->MultiCell(60, 6, utf8_decode('FACTURA ELECTRÓNICA ' . $sale->number), 1, 'C');
        }

        $fpdf->Ln();

        if ($sale->voucher == 'Boleta') {
            $fpdf->SetFont('Arial', 'B', 12);
            $fpdf->Cell(30, 8, utf8_decode('Nombre:'));
            $fpdf->SetFont('Arial', '', 12);
            $fpdf->Cell(160, 8, utf8_decode($sale->client->name . ' ' . $sale->client->last_name));

            $fpdf->Ln();
            $fpdf->SetFont('Arial', 'B', 12);
            $fpdf->Cell(30, 8, 'DNI:');
            $fpdf->SetFont('Arial', '', 12);
            $fpdf->Cell(160, 8, $sale->client->document);

        } elseif ($sale->voucher == 'Factura') {
            $fpdf->SetFont('Arial', 'B', 12);
            $fpdf->Cell(30, 8, utf8_decode('Razón social:'));
            $fpdf->SetFont('Arial', '', 12);
            $fpdf->Cell(160, 8, utf8_decode($sale->bussiness_name));

            $fpdf->Ln();
            $fpdf->SetFont('Arial', 'B', 12);
            $fpdf->Cell(30, 8, 'RUC:');
            $fpdf->SetFont('Arial', '', 12);
            $fpdf->Cell(160, 8, $sale->bussiness_document);
        }

        $fpdf->Ln();
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(30, 8, utf8_decode('Emisión:'));
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(160, 8, $sale->date);

        $fpdf->Ln();
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(30, 8, utf8_decode('Moneda:'));
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(160, 8, utf8_decode('Sol'));

        $fpdf->Ln(20);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->SetFillColor(200, 200, 200);

        $fpdf->Cell(100, 8, 'Producto', 1, 0, 'C', 1);
        $fpdf->Cell(30, 8, 'Precio', 1, 0, 'C', 1);
        $fpdf->Cell(30, 8, 'Cantidad', 1, 0, 'C', 1);
        $fpdf->Cell(30, 8, 'Subtotal', 1, 0, 'C', 1);

        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Ln();

        foreach ($sale->details as $detail) {
            $fpdf->Cell(100, 8, utf8_decode($detail->product->name), 1, 0, 'L');
            $fpdf->Cell(30, 8, $detail->price, 1, 0, 'R');
            $fpdf->Cell(30, 8, $detail->quantity, 1, 0, 'R');
            $fpdf->Cell(30, 8, number_format($detail->price * $detail->quantity, 2), 1, 0, 'R');
            $fpdf->Ln();
        }

        $fpdf->Ln();
        $fpdf->SetFont('Arial', 'B', 10);

        $total    = $sale->total - $sale->delivery->price;
        $igv      = $total * 0.18;
        $subtotal = $total - $igv;

        $fpdf->Cell(160, 5, 'SUBTOTAL', 0, 0, 'R');
        $fpdf->Cell(30, 5, number_format($subtotal, 2), 0, 0, 'R');
        $fpdf->Ln();

        $fpdf->Cell(160, 5, 'IGV', 0, 0, 'R');
        $fpdf->Cell(30, 5, number_format($igv, 2), 0, 0, 'R');
        $fpdf->Ln();

        $fpdf->Cell(160, 5, 'ENVIO', 0, 0, 'R');
        $fpdf->Cell(30, 5, $sale->delivery->price, 0, 0, 'R');
        $fpdf->Ln();

        $fpdf->Cell(160, 5, 'TOTAL', 0, 0, 'R');
        $fpdf->Cell(30, 5, $sale->total, 0, 0, 'R');

        return $fpdf->Output('S');
    }
}
