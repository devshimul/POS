<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){

        return view('index');

    }

    public function viewUser(){
        $data = User::all();
        return view('pages.view-user', compact('data'));
    }
    public function setting(){
        return view('pages.setting');
    }
}
