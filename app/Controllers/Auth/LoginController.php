<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function loginUser(): string
    {
        $is_login = $this->is_login;

        $siteKey = env('Auth_Kong_sitekey');
        return view('auth/login', compact('siteKey', 'is_login'));
    }

    public function checkUser(){
        $request = service('request');
        $userIP = $request->getIPAddress();

        $userModel = new UserModel();

        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        // Jika alamat IP null, masukkan nilai IP baru
        if ($user && $user['ip_address'] === null) {
            $user['ip_address'] = $userIP;
            $userModel->save($user);
        }

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->to('login')->with('error', 'Invalid email or password');
        }

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
            return redirect()->back()->withInput()->with('error', 'You have to resolve captcha to login! 😊.');
        };

        // Set session
        $this->setUserSession($user);

        return redirect()->to('dashboard');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id_user'],
            'email' => $user['email'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}