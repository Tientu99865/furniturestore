<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Invoice;
use App\Products;
use App\User;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    //
    public function getQuanLy(){
        $countProducts = Products::all()->count();
        $countUsers = User::all()->count();
        $countCustomers = Customers::all()->count();
        $countInvoices = Invoice::all()->count();
        $invoices = Invoice::orderBy('id','DESC')->paginate(5);
        return view('admin/trangchu/index',
        [
            'countProducts'=>$countProducts,
            'countUsers'=>$countUsers,
            'countCustomers'=>$countCustomers,
            'countInvoices'=>$countInvoices,
            'invoices'=>$invoices,
        ]
        );
    }
}
