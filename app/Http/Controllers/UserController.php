<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class UserController extends Controller
{
    public function showAuthPage(){
        return view('auth');
    }

    public function showRegisterPage(){
        return view('register');
    }

    public function register(RegisterRequest $req){
        $result = ['status' => false, 'error' => 'Your passwords do not match'];
        if($req['password'] == $req['repassword']){
            $findUser = Sentinel::findByCredentials(['email' => $req['email']]);
            $result['error'] = "This user already exist";
            if($findUser == null){
                Sentinel::registerAndActivate(['email' => $req['email'], 'password' => $req['password']]);
                $result = ['status' => true];
            }
        }

        return response($result);
    }

    public function auth(){
        
    }
}
