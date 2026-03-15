<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index(Request $request){
        $sales = Sale::active()->when($request->number, function($query, $number){
            return $query->where('number', 'LIKE', '%'.$number.'%');
        })->when($request->date, function($query, $date){
            return $query->whereDate('date', $date);
        })->orderBy('date', 'desc')->paginate(20);

        return view('admin.sales.index', compact('sales'));
    }

    public function edit(Request $request, Sale $sale){
        return view('admin.sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale){
        $request->validate([
            'status' => 'required',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('message', 'Registro actualizado');
    }

    public function destroy(Request $request, Sale $sale){
        $sale->update(['deleted' => 1]);

        return redirect()->route('sales.index')->with('message', 'Registro eliminado');
    }

    public function pdf(Request $request, Sale $sale, Fpdf $fpdf){
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', 'B', 12);
#        $fpdf->Image(asset('assets/web/img/logo.png'), 10, 10, 30);

        $fpdf->Cell(40, 10);
        $fpdf->Cell(90, 10, 'COMPTECH', 0, 0, 'C');

        if($sale->voucher == 'Boleta'){
            $fpdf->MultiCell(60, 6, utf8_decode('BOLETA DE VENTA ELECTRÓNICA '.$sale->number), 1, 'C');
        }elseif($sale->voucher == 'Factura'){
            $fpdf->MultiCell(60, 6, utf8_decode('FACTURA ELECTRÓNICA '.$sale->number), 1, 'C');
        }
        

        $fpdf->Ln();

        if($sale->voucher == 'Boleta'){

            $fpdf->SetFont('Arial', 'B', 12);
            $fpdf->Cell(30, 8, utf8_decode('Nombre:'));
            $fpdf->SetFont('Arial', '', 12);
            $fpdf->Cell(160, 8, utf8_decode($sale->client->name.' '.$sale->client->last_name));

            $fpdf->Ln();
            $fpdf->SetFont('Arial', 'B', 12);
            $fpdf->Cell(30, 8, 'DNI:');
            $fpdf->SetFont('Arial', '', 12);
            $fpdf->Cell(160, 8, $sale->client->document);

        }elseif($sale->voucher == 'Factura'){

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

        foreach($sale->details as $detail){

            $fpdf->Cell(100, 8, utf8_decode($detail->product->name), 1, 0, 'L');
            $fpdf->Cell(30, 8, $detail->price, 1, 0, 'R');
            $fpdf->Cell(30, 8, $detail->quantity, 1, 0, 'R');
            $fpdf->Cell(30, 8, number_format($detail->price * $detail->quantity, 2), 1, 0, 'R');

            $fpdf->Ln();

        }

        $fpdf->Ln();
        $fpdf->SetFont('Arial', 'B', 10);

        $total = $sale->total - $sale->delivery->price;
        $igv = $total * 0.18;
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


        $fpdf->Output();
        exit;
    }
}
