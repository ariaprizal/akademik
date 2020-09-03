<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\User;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function loginview(){
        return view('loginview');
    }

    public function postlogin(Request $req){
        $user = $req->only('nrp', 'password');

        if (\Auth::attempt($user)) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
