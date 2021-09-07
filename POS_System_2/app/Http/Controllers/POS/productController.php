<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        return view('pages.add-product');
    }
    public function store( Request $request){
        return 'Hello';
    }
    public function view(){
        return view('pages.view-product');
    }
}
