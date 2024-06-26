<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PragmaRX\Random\Random;

class RecoveryController extends BaseController
{
    public function forget() {
        $is_login = $this->is_login;

        return view('auth/forget', compact('is_login'));
    }

    public function sendResetLink() {
        $random = new Random();
        $otp = $random->numeric()->size(6)->get();

        $email = $this->request->getPost('email');

        $userModel = new UserModel();
        $find = $userModel->where('email', $email)->first();

        if (!$find) {
            return redirect()->to('forget-password')->with('error', 'Email tidak terdaftar');
        }

        $userModel->update($find['id_user'], ['remember_token' => $otp]);

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.swgdiamond.com';                  //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'support@swgdiamond.com';                             //SMTP username
            $mail->Password   = 'Aikova123!';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('support@swgdiamond.com', 'Password recovery');
            $mail->addAddress($email, $find['username']);     //Add a recipient
            $mail->addCC($email);

            //Content
            $mail->isHTML(true);    //Set email format to HTML
            $mail->Subject = 'Reset Password OTP';
            $mail->Body    = 'Hello,<br><br>' .
            'The OTP code to reset your password is: <strong>' . $otp . '</strong>.<br><br>' .
            'Do not share this code with anyone. If you have not requested a password reset, please ignore this email.<br><br>' .
            'Thank you,<br>' .
            'Team support';
            $mail->send();
        } catch (Exception $e) {
        }

        return redirect()->to('passcode');
    }

    public function passCode(){
        $is_login = $this->is_login;
        return view('auth/passcode', compact('is_login'));
    }

    public function passingOTP(){
        $userModel = new UserModel();

        $otp = $this->request->getPost('otpcode');
        $find = $userModel->where('remember_token', $otp)->first();

        if (!$find) {
            return redirect()->back()->to('passcode')->with('error', 'Wrong code and try again!.');
        };

        if($otp === $find['remember_token']){
            return $this->setPassword($find);
        };
    }

    public function setPassword($find){
        $is_login = $this->is_login;
        $idUser = $find['id_user'];

        return view('auth/recovery', compact('idUser', 'is_login'));
    }

    public function recoveryPassword(){
        $UserID = $this->request->getPost('iduser');
        $password = $this->request->getPost('password');
        $encrypt = password_hash($password, PASSWORD_DEFAULT);
        $userModel = new UserModel();
        $find = $userModel->where('id_user', $UserID)->first();
        $userModel->update($find['id_user'], ['password' => $encrypt]);

        return redirect()->to('login');
    }

}
