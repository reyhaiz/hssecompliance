<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login/login');
    }

    public function authenticate()
    {
        // Logika autentikasi
    }

    public function forgot_password()
    {
        return view('login/forgot_password');
    }

    public function send_reset_link()
    {
        $session = session();
        $email = $this->request->getPost('email');
        
        // Cek apakah email ada di database
        $model = new UserModel();
        $data = $model->where('email', $email)->first();
        
        if($data){
            // Simpan permintaan reset password ke database
            $updateData = [
                'reset_requested' => true
            ];
            $model->update($data['id'], $updateData);

            $session->setFlashdata('msg', 'Permintaan reset kata sandi telah berhasil. Silakan periksa email Anda.');
        } else {
            $session->setFlashdata('msg', 'Email tidak ditemukan. Hubungi super admin untuk mendaftarkan akun Anda.');
        }

        return redirect()->to('login/forgot_password');
    }
}
