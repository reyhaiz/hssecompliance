<?php

namespace App\Controllers;

use App\Models\UserModel;

class SuperAdmin extends BaseController
{
    public function dashboard()
    {
        return view('superadmin/dashboard');
    }

    public function manage_admin()
    {
        $model = new UserModel();
        $data['admins'] = $model->where('peran', 'admin')->findAll();
        return view('superadmin/manage_admin', $data);
    }

    public function add_admin()
    {
        return view('superadmin/add_admin');
    }

    public function save_admin()
    {
        $model = new UserModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'kata_sandi' => md5($this->request->getVar('kata_sandi')),
            'peran' => 'admin',
            'foto_profil' => $this->request->getVar('foto_profil')
        ];
        $model->insert($data);
        return redirect()->to(base_url('superadmin/manage_admin'));
    }

    public function edit_admin($id)
    {
        $model = new UserModel();
        $data['admin'] = $model->find($id);
        return view('superadmin/add_admin', $data);
    }

    public function update_admin()
    {
        $model = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'kata_sandi' => md5($this->request->getVar('kata_sandi')),
            'foto_profil' => $this->request->getVar('foto_profil')
        ];
        $model->update($id, $data);
        return redirect()->to(base_url('superadmin/manage_admin'));
    }

    public function delete_admin($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to(base_url('superadmin/manage_admin'));
    }
}
