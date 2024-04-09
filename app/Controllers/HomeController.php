<?php

namespace App\Controllers;
use App\Models\UserModel;

class HomeController extends BaseController
{
    public function home(): string
    {
        $userModel = new UserModel();
        $totUser = $userModel->countAll();

        return view('home', compact('totUser'));
    }
}
