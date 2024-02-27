<?php

namespace App\Http\Livewire\Freedom;

use App\Http\Service\FreedomService;
use Livewire\Component;

class Info extends Component
{
    public $uuid;
    public $data;
    public $additional_data;
    public $showSendButton = true;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
        $this->data = FreedomService::getScrollInfoByUUID($uuid);
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
        if($this->uuid){
            $this->showSendButton = false;
            FreedomService::sendCodeToBioVerification($this->uuid);
        }
    }
}
