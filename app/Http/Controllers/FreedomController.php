<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreedomController extends Controller
{
    public function index(){
        return view("freedom.index");
    }

    public function info($uuid){
        return view("freedom.info",compact("uuid"));
    }

    public function freedomInfo(Request $request){
        $data = $request->all();
        return view("freedom.freedom-info",compact("data"));
    }
}
