<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Models\TransactionModel;
use Carbon\Carbon;
use PragmaRX\Random\Random;

class FaucetController extends BaseController
{
    public function running()
    {
        $session = session();
        $idUser = $session->get('id');
        $random = new Random();
        $string = $random->lowercase()->size(40)->get();
        $userModel = new UserModel();
        $transactModel = new TransactionModel();
        $settingModel = new SettingModel();
        $getReward = $settingModel->first();

        $usrdata = $userModel->find($idUser);
        $timeNow = Carbon::now()->unix();
        $LastClaimTime = $usrdata['last_claim'];
        $canClaim = $LastClaimTime + 60;

        if(!is_null($usrdata)){
            // AuthKong verification API URL
            $url = "https://verify.authkong.com/";

            // Data to be sent
            $data = [
                'secret' => '3273b8acdab15bf53fb0e29257564ed0460b0bf20ac4f594b2adc9e1a9a04959', // Replace with your private key
                'response' => $_POST['captcha-response'] // Captcha response from the frontend
            ];

            // Use cURL for the API request
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // Decode and use the response
            $result = json_decode($response, true);

            if ($result['success'] == true) {
                if ($usrdata['energy'] >= 1 && $timeNow >= $canClaim) {
                    $timecd = Carbon::now()->unix();    // Cooldown time
                    $balance = $usrdata['balance']; // Check balance
                    $energy = $usrdata['energy']; // Check energy
                    $reward = $getReward['reward_rate']; // Reward from faucet
                    $Lostenergy = 1; // Energy decrease
                    $newBalance = $balance + $reward; // New balance
                    $newEnergy = $energy - $Lostenergy; // New energy

                    $userModel->update($idUser, [
                        'balance' => $newBalance,
                        'last_claim' => $timecd,
                        'energy' => $newEnergy
                    ]);

                    $data = [
                        'user' => $idUser,
                        'hash' => $string,
                        'amount' => $reward,
                        'type' => 'Claim'
                    ];
                    $transactModel->insert($data);

                    $downline = $usrdata['reff_by'];
                    if(!is_null($downline)){
                        $this->RewardReferrer($usrdata, $reward);
                    };
                }
            } else {
                return redirect()->back();
            }

        }
        return redirect()->back();
    }

    public function RewardReferrer($usrdata, $reward){
        $random = new Random();
        $hashBonus = $random->lowercase()->size(40)->get();

        $userModel = new UserModel();
        $transactModel = new TransactionModel();

        $downline = $usrdata['reff_by'];
        $upline = $userModel->where('id_user', $downline)->first();
        $uplineBal = $upline['balance'];
        $newUplineBal = $uplineBal + $reward;
        $userModel->update($downline, [
            'balance' => $newUplineBal,
        ]);

        $data = [
            'user' => $downline,
            'hash' => $hashBonus,
            'amount' => $reward,
            'type' => 'Bonus'
        ];
        $transactModel->insert($data);

        return true;
    }
}