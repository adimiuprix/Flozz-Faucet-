<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Carbon\Carbon;

class FaucetController extends BaseController
{
    public function running()
    {
        $session = session();
        $idUser = $session->get('id');

        $userModel = new UserModel();
        $usrdata = $userModel->find($idUser);
        $timeNow = Carbon::now()->unix();
        $LastClaimTime = $usrdata['last_claim'];
        $canClaim = $LastClaimTime + 60;

        if(!is_null($usrdata)){
            if ($usrdata['energy'] >= 1 && $timeNow >= $canClaim) {
                $timecd = Carbon::now()->unix();    // Cooldown time
                $balance = $usrdata['balance']; // Check balance
                $energy = $usrdata['energy']; // Check energy
                $reward = '50'; // Reward from faucet
                $Lostenergy = 1; // Energy decrease
                $newBalance = $balance + $reward; // New balance
                $newEnergy = $energy - $Lostenergy; // New energy

                $userModel->update($idUser, [
                    'balance' => $newBalance,
                    'last_claim' => $timecd,
                    'energy' => $newEnergy
                ]);
            }
        }
        return redirect()->back();
    }
}