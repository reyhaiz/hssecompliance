<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class SuperAdmin extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function dashboard()
    {
        return view('superadmin/dashboard');
    }

    public function manage_admin()
    {
        $data['admins'] = $this->userModel->where('role', 'admin')->findAll();
        return view('superadmin/manage_admin', $data);
    }

    public function add_admin()
    {
        return view('superadmin/add_admin');
    }

    public function save_admin()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'kata_sandi' => password_hash($this->request->getPost('kata_sandi'), PASSWORD_BCRYPT),
            'role' => 'admin',
        ];

        $this->userModel->save($data);
        return redirect()->to(base_url('superadmin/manage_admin'));
    }

    public function edit_admin($id)
    {
        $data['admin'] = $this->userModel->find($id);
        return view('superadmin/edit_admin', $data);
    }

    public function update_admin()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        ];

        if ($this->request->getPost('kata_sandi')) {
            $data['kata_sandi'] = password_hash($this->request->getPost('kata_sandi'), PASSWORD_BCRYPT);
        }

        $this->userModel->update($id, $data);
        return redirect()->to(base_url('superadmin/manage_admin'));
    }

    public function delete_admin($id)
    {
        $this->userModel->delete($id);
        return redirect()->to(base_url('superadmin/manage_admin'));
    }

    public function reset_password()
    {
        return view('superadmin/reset_password');
    }
}
