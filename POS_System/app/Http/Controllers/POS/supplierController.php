<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    protected $data = [];

    public function index()
    {
        return view('pages.supplier.add-supplier');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:suppliers',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $data = new Supplier();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Supplier Insert Successfylly');
        } else {
            return back()->with('fail', 'Supplier Insert Failed');
        }
    }
    public function view()
    {
        $this->data['suppliers'] = Supplier::all();
        return view('pages.supplier.view-supplier', $this->data);
    }
    public function edit(Request $request)
    {
        $this->data['supplier'] = Supplier::find($request->id);
        return view('pages.supplier.edit-suppliers', $this->data);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $data = Supplier::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $result = $data->save();
        if ($result) {
            return redirect()->route('supplier.view')->with('success', 'Supplier Update Successfylly');
        } else {
            return back()->with('fail', 'Supplier Update Failed');
        }
    }



    public function delete(Request $request)
    {
        $data = Supplier::find($request->id);
        $result = $data->delete();
        if ($result) {
            return back()->with('success', 'Data Deleted Successfully');
        } else {
            return back()->with('fail', 'Data Deleted failed');
        }
    }
}
