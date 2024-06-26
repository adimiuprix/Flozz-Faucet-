<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SettingModel;
use PragmaRX\Random\Random;

class RegisterController extends BaseController
{
    public function registUser()
    {
        helper('cookie');

        $reffCode = $this->request->getCookie('refflink');

        $is_login = $this->is_login;

        $siteKey = env('Auth_Kong_sitekey');

        return view('auth/registration', compact('reffCode', 'is_login', 'siteKey'));
    }

    public function register()
    {
        $request = service('request');
        $random = new Random();
        $settingModel = new SettingModel();
        $setEnergy = $settingModel->first();

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

        // Ambil IP
        $userIP = $request->getIPAddress();

        // Cek apakah ada pengguna dengan alamat IP yang sama dalam database
        $existingUser = $userModel->where('ip_address', $userIP)->first();

        // Jika ada pengguna dengan alamat IP yang sama, tolak registrasi
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'You cant create multiple account! 😈.');
        }

        $captchaAuth = env('CAPTCHA_AUTH');

        if($captchaAuth == 1){
            // AuthKong verification API URL
            $url = "https://verify.authkong.com/";

            // Data to be sent
            $data = [
                'secret' => env('Auth_Kong_secret'), // Replace with your private key
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

            if ($result['success'] == false) {
                return redirect()->back()->withInput()->with('error', 'You have to resolve captcha to registration! 😊.');
            };
        };

        // Ambil data dari form
        $reff_by = $this->request->getPost('reffcode');

        if(!is_null($reff_by)){
            $usrReff = $userModel->where('referral_code', $reff_by)->first();

            // Buat data pengguna
            $userData = [
                'ip_address' => $userIP,
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'referral_code' => $random->mixedcase()->size(8)->get(),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'reff_by' => $usrReff !== null ? $usrReff['id_user'] : null,
                'energy' => $setEnergy['free_energy']
            ];

            // Simpan data pengguna ke dalam database
            $userModel->save($userData);
        }

        // Redirect ke halaman sukses atau halaman lainnya
        return redirect()->to('login')->with('fastmsg', 'Registration successful, please log in');
    }

    public function refflink($reffcode){
        helper('cookie');
        $expire = time() + 8400;
        $path = "/registration";
        setcookie('refflink', $reffcode, $expire, $path);

        return redirect()->to('registration');
    }
}