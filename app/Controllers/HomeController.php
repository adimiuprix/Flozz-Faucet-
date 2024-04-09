<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function home(): string
    {
        return view('home');
    }
}
