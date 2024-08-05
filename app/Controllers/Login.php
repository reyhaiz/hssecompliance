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
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['kata_sandi'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'peran' => $data['peran'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);

                // Set flashdata for successful login alert
                $session->setFlashdata('success', 'Selamat Anda berhasil masuk sebagai ' . ucfirst($data['peran']));

                // Redirect based on role
                if ($data['peran'] == 'superadmin') {
                    return redirect()->to('/superadmin/dashboard');
                } else {
                    return redirect()->to('/admin/dashboard');
                }
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
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

        if ($data) {
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
