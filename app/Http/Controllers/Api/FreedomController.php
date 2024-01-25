<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FreedomResponse;
use Illuminate\Http\Request;

class FreedomController extends Controller
{
    public function info(Request  $request){
        FreedomResponse::create(
            ["data"=>$request->all()]
        );
        return response()->json("ok");
    }

    public function success(Request  $request){
        FreedomResponse::create(
            ["data"=>$request->all(),"success"=>true]
        );
        return response()->json("ok");
    }

    public function failure(Request  $request){
        FreedomResponse::create(
            ["data"=>$request->all(),"success"=>false]
        );
        return response()->json("ok");
    }
}
