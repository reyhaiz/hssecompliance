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

        // Use 'email_admin' here to match the database column
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Ensure the correct column name 'email_admin' is used
        $data = $model->where('email_admin', $email)->first();

        if ($data) {
            $pass = $data['password_admin']; // Ensure you use 'password_admin'
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {
                // Use 'idadmin' instead of 'id'
                $ses_data = [
                    'idadmin' => $data['idadmin'], // Updated to 'idadmin'
                    'nama' => $data['nama_admin'], // Use 'nama_admin'
                    'email' => $data['email_admin'], // Use 'email_admin'
                    'role' => $data['role'], // Ensure 'role' matches
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);

                // Redirect based on role
                if ($data['role'] == 'superadmin') {
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
