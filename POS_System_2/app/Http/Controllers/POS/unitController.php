<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class unitController extends Controller
{
    public function add(){
        return view('pages.add-unit');
    }
    public function view(){
        return view('pages.view-unit');
    }
}
