<?php

namespace App\Http\Controllers;

use App\Models\Cookie;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function showPage(){
        $getCookie = Cookie::orderby('id', 'desc')->first();
        $headres = [$getCookie->cookie];
        $ch = curl_init("http://89.22.229.228:5080/rest/v2/request?_path=LiveApp/rest/v2/broadcasts/list/0/10&sort_by=&order_by=");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headres);
        $streams = json_decode(curl_exec($ch));
        curl_close($ch);
        return view('home', compact('streams'));
    }
}
