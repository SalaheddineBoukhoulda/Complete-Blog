<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }


    public function index(){
        return view('admin.settings.index')->with('settings',Settings::first());
    }

    public function update(Request $request){
        $this->validate($request,[
            'site_name' => 'required',
            'site_email' => 'required|email',
            'site_number' => 'required',
            'site_adress' => 'required'
        ]);
        $settings = Settings::first();
        $settings->site_name = $request->site_name;
        $settings->site_email = $request->site_email;
        $settings->site_number = $request->site_number;
        $settings->site_adress = $request->site_adress;
        $settings->update();
        return redirect()->back();
    }
}
