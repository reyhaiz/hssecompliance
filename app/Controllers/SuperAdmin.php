<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RegulationModel;
use App\Models\AdminActivityLogModel;
use CodeIgniter\Controller;

class SuperAdmin extends Controller
{
    protected $userModel;
    protected $regulationModel;
    protected $adminActivityLogModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->regulationModel = new RegulationModel();
        $this->adminActivityLogModel = new AdminActivityLogModel();
    }

    public function dashboard()
    {
        // Menghitung jumlah total regulasi
        $totalRegulations = $this->regulationModel->countAllResults();

        // Menghitung jumlah regulasi dengan kepatuhan "Ya"
        $countComplianceYes = $this->regulationModel->where('kepatuhan', 'Ya')->countAllResults();

        // Menghitung jumlah regulasi dengan kepatuhan "Tidak"
        $countComplianceNo = $this->regulationModel->where('kepatuhan', 'Tidak')->countAllResults();

        $data = [
            'total_regulations' => $totalRegulations,
            'count_compliance_yes' => $countComplianceYes,
            'count_compliance_no' => $countComplianceNo,
        ];

        return view('superadmin/dashboard', $data);
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

    public function admin_activity_log()
    {
        $activityLogs = $this->adminActivityLogModel
            ->select('admin_activity_log.*, admin.nama_admin')
            ->join('admin', 'admin_activity_log.idadmin = admin.idadmin', 'left')
            ->findAll();

        $data = [
            'activityLogs' => $activityLogs,
        ];

        return view('superadmin/admin_activity_log', $data);
    }
}
