<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->data['title'] = 'View All Category';
    }

    public function add()
    {
        return view('pages.category.add-category');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new Category();
        $data->name = $request->name;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Category Insert Successfylly');
        } else {
            return back()->with('fail', 'Category Insert Failed');
        }
    }
    public function view()
    {
        $this->data['data'] = Category::all();
        return view('pages.category.view-category', $this->data);
    }
    public function edit(Request $request)
    {
        $this->data['data'] = Category::find($request->id);
        return view('pages.category.edit-category', $this->data);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data =Category::find($request->id);
        $data->name = $request->name;
        $result = $data->save();
        if ($result) {
            return redirect()->route('category.view')->with('success', 'Category Update Successfully');
        } else {
            return back()->with('fail', 'Category Update Failed');
        }
    }


    public function delete(Request $request)
    {
        $data = Category::find($request->id);
        $result = $data->delete();
        if ($result) {
            return back()->with('success', 'Data Deleted Successfully');
        } else {
            return back()->with('fail', 'Data Deleted failed');
        }
    }
}
