<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        $idUser = $session->get('id');

        return view('user/dashboard');
    }
}
