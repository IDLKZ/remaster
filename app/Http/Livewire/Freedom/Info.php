<?php

namespace App\Http\Livewire\Freedom;

use App\Http\Service\FreedomService;
use App\Models\SmsVerification;
use Carbon\Carbon;
use Livewire\Component;

class Info extends Component
{
    public $uuid;
    public $data;
    public $additional_data;
    public $showSendButton = true;
    public $sendedBefore;
    public $send = true;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
        $this->data = FreedomService::getScrollInfoByUUID($uuid);
        $this->sendedBefore = SmsVerification::where(["uuid"=>$uuid])->first();
        if($this->sendedBefore){
            if($this->sendedBefore->expired_at > Carbon::now()){
                $this->send = false;
            }
        }
        if ($this->data["result"] == "ISSUED"){
            $this->additional_data = FreedomService::getBaseScrollInfoByUUID($uuid);
        }
    }

    public function render()
    {
        return view('livewire.freedom.info');
    }

    public function sendSMSCode()
    {
        if($this->uuid && $this->send){
            $this->showSendButton = false;
            FreedomService::sendCodeToBioVerification($this->uuid);
        }
    }
}
