<?php

namespace App\Controllers;

class ContactController extends BaseController
{
    public function contact(): string
    {
        return view('contact');
    }
}
