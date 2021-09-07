<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class unitController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->data['title'] = 'View All Units';
    }

    public function add(){
        return view('pages.unit.add-unit');
    }
    public function view(){
        $this->data['units'] = Unit::all();
        return view('pages.unit.view-unit', $this->data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new Unit();
        $data->name = $request->name;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Unit Insert Successfylly Done');
        } else {
            return back()->with('fail', 'Unit Insert Failed');
        }
    }
    
    public function edit(Request $request){
        $this->data['unit'] = Unit::find($request->id);
        return view('pages.unit.edit-unit', $this->data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data =Unit::find($request->id);
        $data->name = $request->name;
        $result = $data->save();
        if ($result) {
            return redirect()->route('unit.view')->with('success', 'Unit Update Successfylly Done');
        } else {
            return back()->with('fail', 'Unit Update Failed');
        }
    }
    public function delete(Request $request)
    {
        $data = Unit::find($request->id);
        $result = $data->delete();
        if ($result) {
            return back()->with('success', 'Data Deleted Successfully');
        } else {
            return back()->with('fail', 'Data Deleted failed');
        }
    }
}
