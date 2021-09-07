<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    public function index(){
        return view('pages.add-supplier');
    }
    public function store(Request $request){
        return ' add-supplier' ;
    }
    public function view(){
        return view('pages.view-supplier');
    }

}
