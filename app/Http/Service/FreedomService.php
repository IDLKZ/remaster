<?php

namespace App\Http\Service;

use App\Mail\FreedomMail;
use App\Models\FreedomRequest;
use App\Models\FreedomToken;
use App\Models\SmsVerification;
use http\Env;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Str;

class FreedomService
{
        public const  FREEDOM_USERNAME="FREEDOM_USERNAME";
        public const FREEDOM_PASSWORD="FREEDOM_PASSWORD";
        public const FREEDOM_BACK_API = "FREEDOM_BACK_API";
        public const FREEDOM_PARTNER_ID = "FREEDOM_PARTNER_ID";
        public const FREEDOM_CHANNEL = "FREEDOM_CHANNEL";
        public const FREEDOM_REDIRECT_HOOK = "FREEDOM_REDIRECT_HOOK";
        public const FREEDOM_REDIRECT_SUCCESS = "FREEDOM_REDIRECT_SUCCESS";
        public const FREEDOM_REDIRECT_FAILURE = "FREEDOM_REDIRECT_FAILURE";

        public const AUTH_API = "/ffc-api-auth/";
        public const REFRESH_ACCESS_TOKEN_API = "/ffc-api-auth/refresh/";
        public const SEND_OTP_URL = "/ffc-api-public/universal/general/send-otp";
        public const VALIDATE_OTP_URL = "/ffc-api-public/universal/general/validate-otp";
        public const SEND_TO_SCROLL_URL = "/ffc-api-public/universal/apply/apply-lead";
        public const GET_SCROLL_RESULT_BY_UUID = "/ffc-api-public/universal/general/scoring-result/";
        public const GET_SCROLL_BASE_RESULT_BY_UUID = "/ffc-api-public/universal/general/base-information/";
        public const SEND_TO_SMS_VERIFICATION_URL = "/ffc-api-public/universal/general/send-redirect-url/";

        public const PAYMENT_MONTH = [
            "install_3"=>3,
            "install_6"=>6,
            "install_12"=>12,
            "install_24"=>24,
            "credit_6"=>6,
            "credit_12"=>12,
            "credit_24"=>24,
            "credit_36"=>36,
            "credit_48"=>48
        ];

    public const PAYMENT_PRODUCT = [
        "install_3"=>"REMASTERKZ",
        "install_6"=>"REMASTERKZ",
        "install_12"=>"REMASTERKZ",
        "install_24"=>"REMASTERKZ_24",
        "credit_6"=>"REMASTERKZ_CR",
        "credit_12"=>"REMASTERKZ_CR",
        "credit_24"=>"REMASTERKZ_CR48",
        "credit_36"=>"REMASTERKZ_CR48",
        "credit_48"=>"REMASTERKZ_CR48"
    ];

    public static function getAccessToken(bool $generateAgain = false)
    {
        if($generateAgain){
            FreedomToken::truncate();
        }
        if(FreedomToken::count("id") > 0){
           $freedom = FreedomToken::first();
           if(Carbon::parse($freedom->updated_at)->addHour(2) < Carbon::now()){
               $raw = self::regenerateAccessToken($freedom->access_token,$freedom->refresh_token);
               if($raw){
                   $freedom->update(["access_token"=>$raw["access"],"refresh_token"=>$raw["refresh"]]);
                   return $freedom->access_token;
               }
           }
           else{
              return $freedom->access_token;
           }
        }
        else{
            $request = Http::post(env(self::FREEDOM_BACK_API).self::AUTH_API,[
                "username"=>\env(self::FREEDOM_USERNAME),
                "password"=>\env(self::FREEDOM_PASSWORD)
            ]);
            if($request->ok()){
                $raw = json_decode($request->body(),true);
                $freedom = FreedomToken::create(["access_token"=>$raw["access"],"refresh_token"=>$raw["refresh"]]);
                return $freedom->access_token;
            }
        }
        return self::getAccessToken(true);
    }


    public static function regenerateAccessToken($access_token,$refresh_token){
        $request = Http::withHeaders(["Authorization"=>$access_token])->post(env(self::FREEDOM_BACK_API).self::REFRESH_ACCESS_TOKEN_API,[
            "refresh"=>$refresh_token,
        ]);
        if($request->ok()){
            $raw = json_decode($request->body(),true);
            return $raw;
        }
    }

    public static function sendOTP($mobile_phone,$iin) : bool{
        $request = Http::withHeaders(["Authorization"=>"JWT " . self::getAccessToken(false)])->post(env(self::FREEDOM_BACK_API).self::SEND_OTP_URL,[
            "iin"=>$iin,
            "mobile_phone"=>$mobile_phone,
        ]);
        if($request->ok()){
            $raw = json_decode($request->body(),true);
            toastr()->addSuccess("Отправлено смс с кодом подтверждения");
            return true;
        }
        if($request->status() == 400){
            $raw = json_decode($request->body(),true);
            if(in_array("errors",$raw)){
                foreach ($raw["errors"] as $error){
                    foreach ($error as $errorItem)
                        toastr()->addError($errorItem);
                }
            }
            toastr()->addError("Что-то пошло не так");
        }
        else{
            toastr()->addError("Что-то пошло не так");
        }
        return false;
    }

    public static function validateOTP($mobile_phone,$iin,$code) : bool{
        $request = Http::withHeaders(["Authorization"=>"JWT " . self::getAccessToken(false)])->post(env(self::FREEDOM_BACK_API).self::VALIDATE_OTP_URL,[
            "iin"=>$iin,
            "mobile_phone"=>$mobile_phone,
            "code"=>$code
        ]);
        if($request->ok()){
            $raw = json_decode($request->body(),true);
            toastr()->addSuccess("Успешно подтвержден код");
            return true;
        }
        if($request->status() == 400){
            $raw = json_decode($request->body(),true);
            if(in_array("errors",$raw)){
                foreach ($raw["errors"] as $error){
                    foreach ($error as $errorItem)
                        toastr()->addError($errorItem);
                }
            }
            toastr()->addError("Что-то пошло не так");
        }
        else{
            toastr()->addError("Что-то пошло не так");
        }
        return false;
    }


    public static function getInfoToScroll($iin,$mobile_phone,$code,$email,$type_id,$principal){
        $product = self::PAYMENT_PRODUCT[$type_id];
        $partner = \env(self::FREEDOM_PARTNER_ID);
        $channel = \env(self::FREEDOM_CHANNEL);
        $period = self::PAYMENT_MONTH[$type_id];
        $hook_url = \env(self::FREEDOM_REDIRECT_HOOK);
        $success_url = \env(self::FREEDOM_REDIRECT_SUCCESS);
        $failure_url = \env(self::FREEDOM_REDIRECT_FAILURE);
        $data = [
            "iin"=>$iin,
            "mobile_phone"=>$mobile_phone,
            "verification_sms_code"=>$code,
            "email"=>$email,
            "product"=>$product,
            "partner"=>$partner,
            "channel"=>$channel,
            "credit_params"=>[
                "period"=>$period,
                "principal"=>$principal,
            ],
            "hook_url"=>$hook_url,
            "additional_information"=>[
                "success_url"=>$success_url,
                "failure_url"=>$failure_url,
                "reference_id"=>\Illuminate\Support\Str::uuid(),
            ]
        ];
        return $data;
    }

    public static function sendToScroll($data){
        $request = Http::withHeaders(["Authorization"=>"JWT " . self::getAccessToken(false)])->post(env(self::FREEDOM_BACK_API).self::SEND_TO_SCROLL_URL,$data);
        if($request->status() == 202){
            $raw = json_decode($request->body(),true);
            $freedomRequest = FreedomRequest::create([
                "iin"=>$data["iin"],
                "mobile_phone"=>$data["mobile_phone"],
                "verification_sms_code"=>$data["verification_sms_code"],
                "email"=>$data["email"],
                "product"=>$data["product"],
                "period"=>$data["credit_params"]["period"],
                "principal"=>$data["credit_params"]["principal"],
                "uuid"=>$raw["uuid"],
                'reference_id'=>Carbon::now()->millisecond . "" . auth()->id(),
                "is_success"=>true
            ]);
                toastr()->addSuccess("Успешно оформлена заявка!");
                Mail::to($data["email"])->send(new FreedomMail($freedomRequest));
            return $raw["uuid"];
        }
        else{
            FreedomRequest::create([
                "iin"=>$data["iin"],
                "mobile_phone"=>$data["mobile_phone"],
                "verification_sms_code"=>$data["verification_sms_code"],
                "email"=>$data["email"],
                "product"=>$data["product"],
                "period"=>$data["credit_params"]["period"],
                "principal"=>$data["credit_params"]["principal"],
                "uuid"=>null,
                "is_success"=>false
            ]);
            toastr()->addError("Упс что-то пошло не так!");
            return null;

        }
    }

    public static function getScrollInfoByUUID($uuid){
        $request = Http::withHeaders(["Authorization"=>"JWT " . self::getAccessToken(false)])->get(env(self::FREEDOM_BACK_API).self::GET_SCROLL_RESULT_BY_UUID .$uuid);
        if($request->status() == 200){
            $raw = json_decode($request->body(),true);
            return $raw;
        }
        else{
            dd($request->status());
            toastr()->addError("Что-то пошло не так");

        }
    }

    public static function getBaseScrollInfoByUUID($uuid){
        $request = Http::withHeaders(["Authorization"=>"JWT " . self::getAccessToken(false)])->get(env(self::FREEDOM_BACK_API).self::GET_SCROLL_BASE_RESULT_BY_UUID .$uuid);
        if($request->status() == 200){
            $raw = json_decode($request->body(),true);
            return $raw;
        }
        else{
            $raw = json_decode($request->body(),true);
            toastr()->addError("Что-то пошло не так");
            toastr()->addError($raw["detail"]);

        }
    }

    public static function sendCodeToBioVerification($uuid){
        $request = Http::withHeaders(["Authorization"=>"JWT " . self::getAccessToken(false)])->post(env(self::FREEDOM_BACK_API).self::SEND_TO_SMS_VERIFICATION_URL .$uuid,["success"=>true]);
        if($request->status() == 200){
            SmsVerification::create([
                "uuid"=>$uuid,
                "start_at"=>Carbon::now(),
                "expired_at"=>Carbon::now()->addHour(),
            ]);
            toastr()->addSuccess("СМС со ссылкой на прохождение биометрии отправлено на ваш номер телефона!");
        }
        else{
            $raw = json_decode($request->body(),true);
            toastr()->addError("Что-то пошло не так при отправке смс на номер телефона:");
            toastr()->addError($raw["detail"]);
        }
    }


}
