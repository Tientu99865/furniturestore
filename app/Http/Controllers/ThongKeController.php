<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoice_details;
use App\Products;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
   public function getDoanhThu(){
       $invoices = Invoice::where('created_at','like','%'.'2020-07'.'%')->get();
        $month = 07;
        $year = 2020;
       return view('admin.thongke.doanhthu',['invoices'=>$invoices,'month'=>$month,'year'=>$year]);
   }

   public function getFilter(Request $request){
       $invoices = Invoice::where('created_at','like','%'.$request->year.'-'.$request->month.'%')->get();
        $month = $request->month;
        $year = $request->year;
       return view('admin.thongke.doanhthu',['invoices'=>$invoices,'month'=>$month,'year'=>$year]);
   }

   public function getBanChay(){
       $products = Products::orderBy('sell_number','DESC')->paginate(10);

       return view('admin.thongke.sanphambanchay',['products'=>$products]);
   }

}
