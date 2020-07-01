<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoice_details;
use PDF;
use Illuminate\Http\Request;

class HoaDonBanController extends Controller
{
    public function getInvoiceDetails($id){
        $invoice = Invoice::find($id);
        $productOrders = Invoice_details::all()->where('invoice_id',$id);
        return view('admin.giaodich.hoadonban.chitiethoadonban',['invoice'=>$invoice,'productOrders'=>$productOrders]);
    }

    public function getPDF($id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }

    public function print_order_convert($id){
        $invoice = Invoice::find($id);
        $productOrders = Invoice_details::all()->where('invoice_id',$id);
        return view('admin.PDF.hoadonban',['invoice'=>$invoice,'productOrders'=>$productOrders]);
    }
}
