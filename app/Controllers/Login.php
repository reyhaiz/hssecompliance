<?php
namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();

        // Mendapatkan input email dan password dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Mencari data pengguna berdasarkan email
        $data = $model->where('email_admin', $email)->first();

        if ($data) {
            // Verifikasi password yang diinput dengan password yang ada di database
            $pass = $data['password_admin']; 
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {
                // Set data session berdasarkan role pengguna (admin atau superadmin)
                $ses_data = [
                    'idadmin' => $data['idadmin'], 
                    'nama' => $data['nama_admin'], 
                    'email' => $data['email_admin'], 
                    'role' => $data['role'], 
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);

                // Redirect pengguna berdasarkan role
                if ($data['role'] == 'superadmin') {
                    return redirect()->to('/superadmin/dashboard');
                } elseif ($data['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    $session->setFlashdata('msg', 'Role not recognized');
                    return redirect()->to('/login');
                }
            } else {
                // Jika password salah
                $session->setFlashdata('msg', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            // Jika email tidak ditemukan
            $session->setFlashdata('msg', 'Email tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        // Menghancurkan session saat pengguna logout
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
