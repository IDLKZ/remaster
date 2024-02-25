<?php

namespace App\Http\Livewire\Freedom;

use App\Http\Service\FreedomService;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Index extends Component
{
    public $accessToken;
    public $stepId = 1;
    public $iin;
    public $mobile_phone;
    public $showFinalButton = true;
    public $loading = false;
    public $uuid;
    public $code;
    public $product;
    public $types = [
        "install_3"=>"3 месяца в рассрочку",
        "install_6"=>"6 месяцев в рассрочку",
        "install_12"=>"12 месяцев в рассрочку",
        "install_24"=>"24 месяца в рассрочку",
        "credit_6"=>"6 месяцев в кредит",
        "credit_12"=>"12 месяцев в кредит",
        "credit_24"=>"24 месяцев в кредит",
        "credit_36"=>"36 месяцев в кредит",
        "credit_48"=>"48 месяцев в кредит"
        ];
    public $type_id;
    public $principal;
    public $email;

    protected $listeners = ['unlockButton'=>"unlockButton"];
    public function mount()
    {

    }

    public function sendOTP(){
        $this->validate(
            [
                "mobile_phone"=>["required"],
                "iin"=>["required","regex:/^\d{12}$/"],
            ],
            [
                "mobile_phone.required"=>"Введите телефон",
                "mobile_phone.regex"=>"Номера должны быть казахстанских операторов",
                "iin.required"=>"Введите ИИН",
                "iin.regexp"=>"ИИН должен состоять из цифр и длиной 12 знаков",
            ],
            ["iin"=>"ИИН","mobile_phone"=>"Телефон"]
        );
        $this->loading = true;
            $result = FreedomService::sendOTP($this->mobile_phone,$this->iin);
            if($result){
                $this->stepId = 2;
            }
        $this->loading = false;
    }

    public function validateOTP(){
        $this->validate(
            [
                "mobile_phone"=>["required"],
                "iin"=>["required","regex:/^\d{12}$/"],
                "code"=>["required"],
            ],
            [
                "mobile_phone.required"=>"Введите телефон",
                "mobile_phone.regex"=>"Номера должны быть казахстанских операторов",
                "iin.required"=>"Введите ИИН",
                "iin.regexp"=>"ИИН должен состоять из цифр и длиной 12 знаков",
                "code.required"=>"Поле код обязательно для заполнения",
            ],
            ["iin"=>"ИИН","mobile_phone"=>"Телефон","code"=>"Код"]
        );
        $this->loading = true;
            $result = FreedomService::validateOTP($this->mobile_phone,$this->iin,$this->code);
            if($result){
                $this->stepId = 3;
            }
        $this->loading = false;

    }

    public function sendToScrollData(){
        $this->validate(
            [
                "mobile_phone"=>["required"],
                "iin"=>["required","regex:/^\d{12}$/"],
                "code"=>["required"],
                "email"=>["required","email"],
                "type_id"=>["required", Rule::in([
                    "install_3",
                    "install_6",
                    "install_12",
                    "install_24",
                    "credit_6",
                    "credit_12",
                    "credit_24",
                    "credit_36",
                    "credit_48"
                ])],
                "principal"=>["required","max:10000000","min:10000","integer"]
            ],
            [
                "mobile_phone.required"=>"Введите телефон",
                "mobile_phone.regex"=>"Номера должны быть казахстанских операторов",
                "iin.required"=>"Введите ИИН",
                "iin.regexp"=>"ИИН должен состоять из цифр и длиной 12 знаков",
                "code.required"=>"Поле код обязательно для заполнения",
                "email.required"=>"Поле Почта обязательно для заполнения",
                "email.email"=>"Поле Почта должно быть действительной почтой",
                "type_id.required"=>"Выберите корректное значение",
                "type_id.in_array"=>"Выберите корректное значение",
                "principal"=>"Сумма для кредитования/рассрочки необходимо заполнить",
                "principal.min"=>"Сумма минимальная 10 000 тенге",
                "principal.max"=>"Сумма максимальная 10 000 000 тенге",
            ],
            ["iin"=>"ИИН","mobile_phone"=>"Телефон","code"=>"Код"]
        );
        $this->showFinalButton = false;
        $this->loading = true;
       $data = FreedomService::getInfoToScroll($this->iin,$this->mobile_phone,$this->code,$this->email,$this->type_id,$this->principal);
       $result = FreedomService::sendToScroll($data);
       $this->showFinalButton = $result != null ? false : true;
       $this->loading = false;
       $this->uuid = $result;
    }


    public function render()
    {
        return view('livewire.freedom.index');
    }
}
