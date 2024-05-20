<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\FaqModel;

class HomeController extends BaseController
{
    public function home(): string
    {
        $userModel = new UserModel();
        $transactModel = new TransactionModel();
        $faqsModel = new FaqModel();

        $getPaid = $transactModel->where('type', 'Withdraw')->findAll();

        $totPaid = 0;

        // Melakukan iterasi untuk setiap transaksi dan menjumlahkan jumlahnya
        foreach ($getPaid as $paid) {
            $totPaid += intval($paid['amount']); // Mengkonversi ke integer sebelum menjumlahkan
        }

        $totUser = $userModel->countAll();

        $is_login = $this->is_login;

        $transacts = $transactModel
            ->join('users', 'users.id_user = transactions.user')
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->findAll();

        $faqs = $faqsModel->findAll();

        return view('home', compact('totUser', 'totPaid', 'is_login', 'transacts', 'faqs'));
    }
}
