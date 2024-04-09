<?php

namespace App\Controllers;

class AboutController extends BaseController
{
    public function about(): string
    {
        return view('about');
    }
}