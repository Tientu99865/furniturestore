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

    public function getDelivered($id){
        $invoice = Invoice::find($id);
        if ($invoice->verify == 0){
            return redirect()->back()->with('Loi','Đơn hàng chưa được xác nhận');
        }else{
            $invoice->verify = 2;
        }
        $invoice->save();

        return redirect()->back()->with('ThongBao','Xác nhận đã giao hàng thành công');
    }

    public function getPaid($id){
        $invoice = Invoice::find($id);
        if ($invoice->verify == 0){
            return redirect()->back()->with('Loi','Đơn hàng chưa được xác nhận');
        }else{
            $invoice->paid = 1;
        }
        $invoice->save();

        return redirect()->back()->with('ThongBao','Xác nhận đã thanh toán thành công');
    }

    public function getCancel($id){
        $invoice = Invoice::find($id);
        $invoice_details = Invoice_details::where('invoice_id',$id)->delete();
        $invoice->delete();

        return redirect()->back()->with('ThongBao','Đã xoá đơn hàng thành công');
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
