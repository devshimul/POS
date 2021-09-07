<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;

class productController extends Controller
{
    protected $data = [];
    public function index(){
        $this->data['categories']= Category::all();
        $this->data['suppliers']= Supplier::all();
        $this->data['units']= Unit::all();
        return view('pages.product.add-product', $this->data);
    }
    public function store( Request $request){
        $request->validate([
               'name' => 'required', 
               'code' => 'required', 
               'category' => 'required', 
               'unit' => 'required', 
               'supplier' => 'required',
        ]);
        $data = new Product();
        $data->product_name = $request->name;
        $data->product_code = $request->code;
        $data->category_id = $request->category;
        $data->unit_id = $request->unit;
        $data->supplier_id = $request->supplier;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Product Insert Successfylly');
        } else {
            return back()->with('fail', 'Product Insert Failed');
        }
    }
    public function view(){
        $this->data['products'] = Product::all();
        return view('pages.product.view-product', $this->data);
    }
    public function edit(Request $request){
        $this->data['categories']= Category::all();
        $this->data['suppliers']= Supplier::all();
        $this->data['units']= Unit::all();
        $this->data['product'] = Product::find($request->id);
        return view('pages.product.edit-product', $this->data);
    }
    public function update( Request $request){
        // dd($request->input());
        $request->validate([
               'name' => 'required', 
               'code' => 'required', 
               'category' => 'required', 
               'unit' => 'required', 
               'supplier' => 'required', 
        ]);
        $data = Product::find($request->id);
        $data->product_name = $request->name;
        $data->product_code = $request->code;
        $data->product_stock = $request->stock;
        $data->cost_price = $request->cost;
        $data->sale_price = $request->sale;
        $data->category_id = $request->category;
        $data->unit_id = $request->unit;
        $data->supplier_id = $request->supplier;
        $result = $data->save();
        if ($result) {
            return redirect()->route('product.view')->with('success', 'Product Update Successfylly');
        } else {
            return back()->with('fail', 'Product Update Failed');
        }
    }

    public function delete(Request $request){
        $data = Product::find($request->id);
        $result = $data->delete();
        if ($result) {
            return back()->with('success', 'Data Deleted Successfully');
        } else {
            return back()->with('fail', 'Data Deleted failed');
        }
    }
}
