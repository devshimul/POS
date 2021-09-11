<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    protected $data = [];
    public function index()
    {

        return view('pages.index');
    }

    public function viewUser()
    {
        $this->data['data'] = User::all();
        return view('pages.view-user', $this->data);
    }
    public function setting()
    {
        $this->setting_data();
        return view('pages.setting', $this->data);
    }
    public function save(Request $request)
    {
        if ($request->id == null) {
            $data = new Setting();
        } else {
            $data = Setting::find($request->id);
        }
        $data->title = $request->title;
        if ($request->file('favicon')) {
            $favimage = $request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->move(public_path('dashboard/images'), $favimage);
            $data->favicon = $favimage;
        }
        if ($request->file('logo')) {
            $logoimage = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('dashboard/images'), $logoimage);
            $data->logo = $logoimage;
        }
        if ($request->file('minilogo')) {
            $minilogo = $request->file('minilogo')->getClientOriginalName();
            $request->file('minilogo')->move(public_path('dashboard/images'), $minilogo);
            $data->minilogo = $minilogo;
        }
        $data->save();
        return redirect()->route('main.dashboard');
    }

    public function profile($id)
    {
        $this->data['user'] = User::find($id);
        return view('pages.profile', $this->data);
    }
    public function profileupdate(Request $request)
    {
        $data = User::find($request->id);
        if ($request->file('profile')) {
            $profileimg = $request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('dashboard/images/profile'), $profileimg);
            $data->image = $profileimg;
        }
        $data->save();
        return redirect()->route('main.dashboard');
    }


    public function setting_data()
    {
        $this->data['tools'] = Setting::first();
        if ($this->data['tools'] == null) {
            $this->data['tools'] = [
                'id' => null,
                'title' => 'POS',
                'favicon' => 'favicon.png',
                'logo' => 'logo.svg',
                'minilogo' => 'mini.svg'
            ];
            $this->data['tools'] = (object) $this->data['tools'];
        }
    }
}
