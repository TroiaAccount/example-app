<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
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
        $result = ['status' => false, 'error' => 'Your passwords do not match', 'code' => 422];
        if($req['password'] == $req['repassword']){
            $findUser = Sentinel::findByCredentials(['email' => $req['email']]);
            $result['error'] = "This user already exist";
            if($findUser == null){
                Sentinel::registerAndActivate(['email' => $req['email'], 'password' => $req['password']]);
                $result = ['status' => true, 'code' => 200];
            }
        }

        return response($result, $result['code']);
    }

    public function auth(AuthRequest $req){
        $findUser = Sentinel::findByCredentials(['email' => $req['email']]);
        $result = ['status' => false, 'error' => 'This user does not exist', 'code' => 422];
        if($findUser != null){
            $auth = Sentinel::authenticate(['email' => $req['email'], 'password' => $req['password']]);
            $result['error'] = "Please write correct data";
            if($auth){
                $result = ['status' => true, 'code' => 200];
            }
        }
        return response($result, $result['code']);
    }
}
