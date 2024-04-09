<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function registUser(): string
    {
        return view('auth/registration');
    }
}