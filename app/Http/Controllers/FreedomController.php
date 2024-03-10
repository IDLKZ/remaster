<?php

namespace App\Http\Controllers;

use App\Http\Service\FreedomService;
use App\Models\FreedomRequest;
use Illuminate\Http\Request;

class FreedomController extends Controller
{
    public function index(){
        return view("freedom.index");
    }

    public function info($uuid){
        if($uuid){
            $freedom_request = FreedomRequest::where(["uuid" => $uuid])->first();
            if($freedom_request){
                return view("freedom.info",compact("uuid"));
            }

        }
        return abort(404);

    }

    public function freedomInfo(Request $request){
        if($request->get("uuid")){
            if($freedom = FreedomRequest::where(["uuid"=>$request->get("uuid")])->first()){
                FreedomService::handleRawData($request->all(),$freedom);
                if ($request->get("result")){
                    if($request->get("result") == "APPROVED"){
                        toastr()->success("Успешно одобрена заявка");
                    }
                    if($request->get("result") == "REJECTED"){
                        toastr()->error("Заявка отклонена");
                    }
                }
                if($request->get("status")){
                    if($request->get("status") == "ISSUED"){
                        toastr()->success("Успешно выдана");
                    }
                    if($request->get("status") == "APPROVED"){
                        toastr()->success("Успешно одобрена заявка");
                    }
                    if($request->get("status") == "REJECTED"){
                        toastr()->error("Заявка отклонена");
                    }
                }
                return redirect()->route("freedom-info",$request->get("uuid"));
            }
        }
        return abort(404);
    }

    public function success(Request $request){
        if($request->get("uuid")){
            if($freedom = FreedomRequest::where(["uuid"=>$request->get("uuid")])->first()){
                FreedomService::handleRawData($request->all(),$freedom);
                if ($request->get("result")){
                    if($request->get("result") == "APPROVED"){
                        toastr()->success("Успешно одобрена заявка");
                    }
                    if($request->get("result") == "REJECTED"){
                        toastr()->error("Заявка отклонена");
                    }
                }
                if($request->get("status")){
                    if($request->get("status") == "ISSUED"){
                        toastr()->success("Успешно выдана");
                    }
                    if($request->get("status") == "APPROVED"){
                        toastr()->success("Успешно одобрена заявка");
                    }
                    if($request->get("status") == "REJECTED"){
                        toastr()->error("Заявка отклонена");
                    }
                }
                return redirect()->route("freedom-info",$request->get("uuid"));
            }
        }
        return abort(404);
    }
    public function failure(Request $request){
        if($request->get("uuid")){
            if($freedom = FreedomRequest::where(["uuid"=>$request->get("uuid")])->first()){
                FreedomService::handleRawData($request->all(),$freedom);
                if ($request->get("result")){
                    if($request->get("result") == "APPROVED"){
                        toastr()->success("Успешно одобрена заявка");
                    }
                    if($request->get("result") == "REJECTED"){
                        toastr()->error("Заявка отклонена");
                    }
                }
                if($request->get("status")){
                    if($request->get("status") == "ISSUED"){
                        toastr()->success("Успешно выдана");
                    }
                    if($request->get("status") == "APPROVED"){
                        toastr()->success("Успешно одобрена заявка");
                    }
                    if($request->get("status") == "REJECTED"){
                        toastr()->error("Заявка отклонена");
                    }
                }
                return redirect()->route("freedom-info",$request->get("uuid"));
            }
        }
        return abort(404);
    }
}
