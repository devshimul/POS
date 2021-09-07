<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class saleController extends Controller
{
    public function index(){
        return view('pages.sale.sale-product');
    }
    public function report(){
        return view('pages.sale.sale-report');
    }
}
