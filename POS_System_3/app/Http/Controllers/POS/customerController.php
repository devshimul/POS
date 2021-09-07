<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    protected $data = [];

    public function index()
    {
        return view('pages.customer.add-customer');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $data = new Customer();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Customer Insert Successfylly');
        } else {
            return back()->with('fail', 'Customer Insert Failed');
        }
    }

    public function view()
    {
        $this->data['customers'] = Customer::all();
        return view('pages.customer.view-customer', $this->data);
    }
    public function edit(Request $request)
    {
        $this->data['customer'] = Customer::find($request->id);
        return view('pages.customer.edit-customer', $this->data);
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $data = Customer::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $result = $data->save();
        if ($result) {
            return redirect()->route('customer.view')->with('success', 'Customer Update Successfylly');
        } else {
            return back()->with('fail', 'Customer Update Failed');
        }
    }



    public function delete(Request $request)
    {
        $data = Customer::find($request->id);
        $result = $data->delete();
        if ($result) {
            return back()->with('success', 'Data Deleted Successfully');
        } else {
            return back()->with('fail', 'Data Deleted failed');
        }
    }
}
