<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale_details;
use App\Models\Sale_master;
use Illuminate\Http\Request;

class saleController extends Controller
{
    public function index(){
        return view('pages.sale.sale-product');
    }
    public function getallproducts(Request $request)
    {
        return response()->json(['products' => Product::all()]);
    }
    public function store(Request $request){
        $sm = new Sale_master();
        $sm->customer_id = $request->customer_id;
        $sm->total_amount = $request->total_amount;
        if($request->discount){
            $sm->discount_perchantage = $request->discount . '%';
        }
        $sm->discount_amount = $request->discount_amount;
        $sm->extra_charge = $request->extra_charge;
        $sm->grand_total = $request->grand_total;
        $sm->paid_amount = $request->paid_amount;
        $sm->due_amount = $request->due_amount;
        $sm->note = $request->note;
        $sm->save();
        foreach($request->product as $product){
            $product = (object)$product; 
            $sd= new Sale_details();
            $sd->sm_id = $sm->id;
            $sd->product_id = $product->product_id;
            $sd->product_qnt = $product->product_qnt;
            $sd->sale_price = $product->product_price;
            $sd->total_amount = $product->sub_total;
            $sd->save();
            $up = Product::find($product->product_id);
            $up->product_stock = $up->product_stock - $product->product_qnt; 
            $up->save();
        }
        return response()->json(['message' => 'true']);    
    }
    public function report(){
        return view('pages.sale.sale-report');
    }
}
