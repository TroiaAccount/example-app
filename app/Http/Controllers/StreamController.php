<?php

namespace App\Http\Controllers;

use App\Models\Cookie;
use Illuminate\Http\Request;

class StreamController extends Controller
{

    public function showPage($stream_id){
        $getCookie = Cookie::orderby('id', 'desc')->first();
        $headres = [$getCookie->cookie];
        $ch = curl_init("http://89.22.229.228:5080/rest/v2/request?_path=LiveApp/rest/v2/broadcasts/$stream_id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headres);
        $stream = json_decode(curl_exec($ch));
        curl_close($ch);
        return view('stream', compact('stream'));
    }

}
