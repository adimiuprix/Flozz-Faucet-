<?php

namespace App\Controllers;
use App\Models\UserModel;

class HomeController extends BaseController
{
    public function home(): string
    {
        $userModel = new UserModel();
        $totUser = $userModel->countAll();

        $session = session();
        $is_login = $session->get('id');

        return view('home', compact('totUser', 'is_login'));
    }
}
