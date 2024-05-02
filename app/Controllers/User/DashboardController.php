<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Models\TransactionModel;
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

    public function topup(){
        return view('user/topup');
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
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $transactModel = new TransactionModel();

        $user = $userModel->find($idUser);
        $userBal = $user['balance'];

        if (is_null($user['address'])) {
            return redirect()->back();
        }

        $api_key = "2e8d07098ab401dfff87033a43a3d61c8623ad75417576a334bbfe6e0c24ac57";
        $url = 'https://faucetpay.io/api/v1/send';
        $amountWd = $this->request->getPost('amount');

        // Data for send
        $data = [
            'api_key' => $api_key,
            'amount' => $amountWd,
            'to' => $this->request->getPost('address'),
            'currency' => 'TRX'
        ];

        if($userBal >= 1){
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
                $result = json_decode($response, true);
                $newBalance = $userBal - $amountWd;

                $data = [
                    'user' => $idUser,
                    'hash' => $result['payout_user_hash'],
                    'amount' => $amountWd,
                    'type' => 'Withdraw'
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
