<?php

namespace App\Http\Livewire\Freedom;

use App\Http\Service\FreedomService;
use Livewire\Component;

class Info extends Component
{
    public $uuid;
    public $data;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
        $this->data = FreedomService::getScrollInfoByUUID($uuid);

    }

    public function render()
    {
        return view('livewire.freedom.info');
    }
}
