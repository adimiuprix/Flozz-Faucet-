<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        $stats = [
            'balance' => $statUsr['balance'],
            'energy' => $statUsr['energy'],
            'reffs' => $userModel->where('reff_by', $idUser)->countAllResults(), // Menghitung jumlah referral
        ];

        return view('user/dashboard', compact('stats'));
    }

    public function faucet()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        $energy = $statUsr['energy'];

        return view('user/faucet', compact('energy'));
    }

    public function referral()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        return view('user/faucet');
    }

    public function withdraw()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        return view('user/faucet');
    }

    public function setting()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        return view('user/faucet');
    }

}
