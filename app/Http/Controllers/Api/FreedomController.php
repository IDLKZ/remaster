<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Service\FreedomService;
use App\Models\FreedomRequest;
use App\Models\FreedomResponse;
use Illuminate\Http\Request;

class FreedomController extends Controller
{
    public function info(Request  $request){
        try {
            if($request->get("uuid")){
                if($freedom = FreedomRequest::where(["uuid"=>$request->get("uuid")])->first()){
                    FreedomService::handleRawData($request->all(),$freedom);
                    return response()->json("ok",200);
                }
                else{
                    return response()->json(["message"=>"Not Found"],404);
                }
            }
            else{
                return response()->json(["message"=>"Not Found"],404);
            }
        }
        catch (\Exception $exception){
            return response()->json(["error"=>$exception->getMessage()],500);
        }
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
