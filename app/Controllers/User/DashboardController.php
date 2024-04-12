<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SettingModel;
use Carbon\Carbon;

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
        $settingModel = new SettingModel();
        $getReward = $settingModel->first();
        $rewardRate = $getReward['reward_rate'];

        $statUsr = $userModel->find($idUser);
        $energy = $statUsr['energy'];
        $timeNow = Carbon::now()->unix();
        $LastClaimTime = $statUsr['last_claim'];
        $CanClaimTime = $LastClaimTime + 60;

        return view('user/faucet', compact('energy', 'rewardRate', 'timeNow', 'CanClaimTime'));
    }

    public function referral()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        $AllReffs = $userModel->where('reff_by', 1)->findAll();
        $reffcode = $statUsr['referral_code'];

        return view('user/referral', compact('AllReffs', 'reffcode'));
    }

    public function withdraw()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        return view('user/withdraw');
    }

    public function setting()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        return view('user/setting');
    }

}
