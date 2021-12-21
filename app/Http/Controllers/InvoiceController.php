<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

class InvoiceController extends Controller
{
    public function show(Invoice $invoice){
        if(request()->kitchen){
            $pdf = PDF::loadView('pdf.invoice-with-kitchen', compact('invoice'));
            return $pdf->stream('Invoice '.date('d-m-Y- h-i-s').'.pdf');
        }else{
            $pdf = PDF::loadView('pdf.invoice', compact('invoice'));
            return $pdf->stream('Invoice '.date('d-m-Y- h-i-s').'.pdf');
        }
    }
}
