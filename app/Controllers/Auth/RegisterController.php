<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function registUser()
    {
        return view('auth/registration');
    }

    public function register()
    {
        // Validasi form registrasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            // Atur aturan validasi sesuai kebutuhan Anda
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'referral_code' => 'permit_empty|valid_referral_code'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $referralCode = $this->request->getPost('referral_code');

        // Buat instance model pengguna
        $userModel = new UserModel();

        // Buat data pengguna
        $userData = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'referral_code' => $referralCode
        ];

        // Simpan data pengguna ke dalam database
        $userModel->save($userData);

        // Redirect ke halaman sukses atau halaman lainnya
        return redirect()->to('success');
    }
}