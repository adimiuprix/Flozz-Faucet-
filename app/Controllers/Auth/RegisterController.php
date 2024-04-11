<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UserModel;
use PragmaRX\Random\Random;

class RegisterController extends BaseController
{
    public function registUser()
    {
        return view('auth/registration');
    }

    public function register()
    {
        $random = new Random();

        // Buat instance model pengguna
        $userModel = new UserModel();

        // Validasi form registrasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            // Atur aturan validasi sesuai kebutuhan Anda
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'referral_code' => 'permit_empty'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $reff_by = $this->request->getPost('reffcode');

        if(!is_null($reff_by)){
            $usrReff = $userModel->where('referral_code', $reff_by)->first();

            // Buat data pengguna
            $userData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'referral_code' => $random->mixedcase()->size(8)->get(),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'reff_by' => $usrReff !== null ? $usrReff['id'] : null,
                'energy' => '50'
            ];

            // Simpan data pengguna ke dalam database
            $userModel->save($userData);
        }

        // Redirect ke halaman sukses atau halaman lainnya
        return redirect()->to('registration');
    }
}