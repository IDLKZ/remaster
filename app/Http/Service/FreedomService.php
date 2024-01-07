<?php

namespace App\Http\Service;

use App\Models\FreedomToken;
use http\Env;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class FreedomService
{
        public const  FREEDOM_USERNAME="FREEDOM_USERNAME";
        public const FREEDOM_PASSWORD="FREEDOM_PASSWORD";
        public const FREEDOM_BACK_API = "FREEDOM_BACK_API";

        public const AUTH_API = "/ffc-api-auth/";
        public const REFRESH_ACCESS_TOKEN_API = "/ffc-api-auth/refresh/";

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


}
