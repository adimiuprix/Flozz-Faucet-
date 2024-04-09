<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function loginUser(): string
    {
        return view('auth/login');
    }

    public function checkUser(){
        
    }
}