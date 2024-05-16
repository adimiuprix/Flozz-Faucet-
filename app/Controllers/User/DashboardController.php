<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Models\TransactionModel;
use Carbon\Carbon;
use PragmaRX\Random\Random;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        $stats = [
            'balance' => number_format($statUsr['balance'] / 100000000, 8),
            'energy' => $statUsr['energy'],
            'reffs' => $userModel->where('reff_by', $idUser)->countAllResults(), // Menghitung jumlah referral
        ];

        return view('user/dashboard', compact('stats'));
    }

    public function offerwall(){
        return view('user/offerwall');
    }

    public function faucet()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $settingModel = new SettingModel();
        $getReward = $settingModel->first();
        $rewardRate = number_format($getReward['reward_rate'] / 100000000, 8);

        $statUsr = $userModel->find($idUser);
        $energy = $statUsr['energy'];
        $timeNow = Carbon::now()->unix();
        $LastClaimTime = $statUsr['last_claim'];
        $CanClaimTime = $LastClaimTime + 60;
        $siteKey = env('Auth_Kong_sitekey');

        return view('user/faucet', compact('energy', 'rewardRate', 'timeNow', 'CanClaimTime', 'siteKey'));
    }

    public function referral()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        $AllReffs = $userModel->where('reff_by', $idUser)->findAll();
        $reffcode = $statUsr['referral_code'];

        return view('user/referral', compact('AllReffs', 'reffcode'));
    }

    public function withdraw()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $statUsr = $userModel->find($idUser);

        return view('user/withdraw', compact('statUsr'));
    }

    public function faucetpay(){
        $random = new Random();
        $string = $random->lowercase()->size(40)->get();

        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $transactModel = new TransactionModel();

        $user = $userModel->find($idUser);
        $userBal = $user['balance'];

        if (is_null($user['address'])) {
            return redirect()->back();
        }

        $api_key = env('FaucetPay_Api_key');
        $url = 'https://faucetpay.io/api/v1/send';
        $amountWd = $this->request->getPost('amount');
        $amountFloat = (float)$amountWd;
        $satoshiValue = $amountFloat * 100000000;

        // Data for send
        $data = [
            'api_key' => $api_key,
            'amount' => $satoshiValue,
            'to' => $this->request->getPost('address'),
            'currency' => 'TRX'
        ];

        if($userBal >= 2000000){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            // Execution and get response
            $response = curl_exec($curl);

            if ($response === false) {
                $error_message = curl_error($curl);
                // Handle error
                echo "Curl error: " . $error_message;
            } else {
                // Decode respons JSON
                json_decode($response, true);

                $satoshiAmount = $amountWd * 100000000;

                $newBalance = $userBal - $satoshiAmount;

                $data = [
                    'user' => $idUser,
                    'hash' => $string,
                    'amount' => $satoshiAmount,
                    'type' => 'Withdraw',
                    'time' => Carbon::now()->unix()
                ];

                $transactModel->insert($data);

                $userModel->update($idUser, [
                    'balance' => $newBalance,
                ]);
            }

            // Close connection
            curl_close($curl);
        }

        return redirect()->back();
    }

    public function setting()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $userdetail = $userModel->find($idUser);

        return view('user/setting', compact('userdetail'));
    }

    public function updateUser(){
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $userModel->update($idUser, [
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('sendto'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->back();
    }
}
