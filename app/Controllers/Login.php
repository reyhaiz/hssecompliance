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
        $email = $this->request->getVar('email');
        $password = md5($this->request->getVar('password'));
        $data = $model->where('email', $email)->where('kata_sandi', $password)->first();
        if($data){
            $session->set([
                'id' => $data['id'],
                'nama' => $data['nama'],
                'email' => $data['email'],
                'peran' => $data['peran'],
                'isLoggedIn' => TRUE
            ]);
            return redirect()->to(base_url($data['peran'].'/dashboard'));
        } else {
            $session->setFlashdata('msg', 'Wrong Email or Password');
            return redirect()->to(base_url('login'));
        }
    }

    public function forgot_password()
    {
        return view('login/forgot_password');
    }
}
