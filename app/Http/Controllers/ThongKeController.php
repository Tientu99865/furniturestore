<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoice_details;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
   public function getDoanhThu(){
       $invoices = Invoice::all();
        $month = 01;
        $year = 2020;
       return view('admin.thongke.doanhthu',['invoices'=>$invoices,'month'=>$month,'year'=>$year]);
   }

   public function getFilter(Request $request){
       $invoices = Invoice::where('created_at','like','%'.$request->year.'-'.$request->month.'%')->get();
        $month = $request->month;
        $year = $request->year;
       return view('admin.thongke.doanhthu',['invoices'=>$invoices,'month'=>$month,'year'=>$year]);
   }
}
