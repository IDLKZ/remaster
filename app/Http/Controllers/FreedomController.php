<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreedomController extends Controller
{
    public function index(){
        return view("freedom.index");
    }
}
