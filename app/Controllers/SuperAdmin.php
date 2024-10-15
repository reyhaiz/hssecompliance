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
        // Hash default password
        $password = 'adminpassword123';
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Data Admin
        $data = [
            'nama_admin' => $this->request->getVar('nama'),
            'email_admin' => $this->request->getVar('email'),
            'password_admin' => $hashedPassword,
            'role' => 'admin',
        ];

        if ($this->userModel->insert($data)) {
            return redirect()->to(base_url('superadmin/manage_admin'))->with('success', 'Admin berhasil ditambahkan');
        } else {
            return redirect()->to(base_url('superadmin/add_admin'))->with('error', 'Gagal menambahkan admin');
        }
    }

    public function edit_admin($id)
    {
        $data['admin'] = $this->userModel->find($id);
        return view('superadmin/edit_admin', $data);
    }

    public function update_admin()
    {
        $id = $this->request->getVar('id');
        $data = [
            'nama_admin' => $this->request->getVar('nama'),
            'email_admin' => $this->request->getVar('email'),
        ];

        if ($this->request->getVar('kata_sandi')) {
            $data['password_admin'] = password_hash($this->request->getVar('kata_sandi'), PASSWORD_BCRYPT);
        }

        if ($this->userModel->update($id, $data)) {
            return redirect()->to(base_url('superadmin/manage_admin'))->with('success', 'Admin berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui admin');
        }
    }

    public function delete_admin($id)
    {
        $this->userModel->delete($id);
        return redirect()->to(base_url('superadmin/manage_admin'))->with('success', 'Admin berhasil dihapus');
    }
}
