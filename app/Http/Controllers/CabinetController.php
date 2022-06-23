<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function showPage(){
        return view('cabinet');
    }
}
