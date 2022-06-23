<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cookie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Send curl request
     *
     * @return string
     */

    private function curl($url, $method = "get", $params = [], $header = ['Content-Type: application/json'], $returnHeaders = true){
        $params = json_encode($params);
        $ch = curl_init("http://89.22.229.228:5080/rest$url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if($method != "get"){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        if($returnHeaders){
            curl_setopt($ch, CURLOPT_HEADER, 1);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        $checkCookie = Cookie::orderby('id', 'desc')->first();
        $auth = true;
        if($checkCookie != null){
            $checkAuth = json_decode($this->curl('/v2/authentication-status', 'get', [], [$checkCookie->cookie], false));
            if($checkAuth->success == true){
                $auth = false;
            }
        }
        if($auth){
            $url = "/v2/users/authenticate";
            $params = [
                'email' => 'admin@gmail.com',
                'password' => md5('w4WscLa7K27Lgme')
            ];
            $getCookie = $this->curl($url, 'post', $params);
            $getCookie = explode("\r\n", $getCookie);
            $result = json_decode(end($getCookie));
            if($result->success == true){
                $cookie = str_replace("Set-Cookie", 'Cookie', $getCookie[2]);
                Cookie::create([
                    'cookie' => $cookie
                ]);
            }
        }
    }
}
