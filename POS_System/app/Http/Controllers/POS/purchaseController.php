<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    public function stock(){
        return view('pages.stock');
    }
    public function purchase(){
        return view('pages.purchase');
    }
}
