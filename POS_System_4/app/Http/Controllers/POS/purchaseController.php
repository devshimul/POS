<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase_details;
use App\Models\Purchase_master;
use Illuminate\Http\Request;

class purchaseController extends Controller

{
    protected $data = [];
    public function purchase(){
        return view('pages.purchase');
    }
    public function getProducts(Request $request)
    {
        return response()->json(['products' => Product::where('supplier_id', '=', $request->id)->get()]);
    }
    public function getProductDetails(Request $request)
    {
        $p = Product::where('id','=', $request->id)->with('unit')->first();
        return response()->json(['product' => $p]);
        return response()->json(['product' => Product::find($request->id)]);
    }
    public function store(Request $request){
        $pm = new Purchase_master();
        $pm->supplier_id = $request->supplier_id;
        $pm->grand_total = $request->grand_total;
        $pm->paid_amount = $request->paid_amount;
        $pm->due_amount = $request->due_amount;
        $pm->note = $request->note;
        $pm->save();
        foreach($request->product as $product){
        $product = (object)$product;     
        $pd = new Purchase_details();
        $pd->pm_id= $pm->id;
        $pd->product_id= $product->product_id;
        $pd->product_qnt= $product->product_qnt;
        $pd->cost_price= $product->product_price;
        $pd->total_amount= $product->sub_total;
        $pd->save();
        $up = Product::find($product->product_id);
        $up->product_stock = $up->product_stock + $product->product_qnt; 
        $up->cost_price =$product->product_price; 
        $up->save();
        } 
        return response()->json(['message' => 'true']);          

    }
}
