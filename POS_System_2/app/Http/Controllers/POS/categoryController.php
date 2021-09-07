<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function add(){
        return view('pages.add-category');
    }
    public function view(){
        return view('pages.view-category');
    }
}
