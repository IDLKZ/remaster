<?php

namespace App\Http\Livewire\Freedom;

use App\Http\Service\FreedomService;
use App\Models\FreedomRequest;
use App\Models\SmsVerification;
use Carbon\Carbon;
use Livewire\Component;

class Info extends Component
{
    public $uuid;
    public $data;
    public $freedom_request;
    public $additional_data;
    public $showSendButton = true;
    public $sendedBefore;
    public $send = true;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
        $this->freedom_request = FreedomRequest::where(["uuid"=>$uuid])->first();
        $this->sendedBefore = SmsVerification::where(["uuid"=>$uuid])->first();
        if($this->sendedBefore){
            if($this->sendedBefore->expired_at > Carbon::now()){
                $this->send = false;
            }
        }
        if($this->sendedBefore == null){
            $this->sendSMSCode();
        }
    }

    public function render()
    {
        return view('livewire.freedom.info');
    }

    public function sendSMSCode()
    {
        if($this->uuid && $this->send && $this->freedom_request->result == "APPROVED"){
            $this->showSendButton = false;
            FreedomService::sendCodeToBioVerification($this->uuid);
        }
    }
}
