<?php

namespace App\Controllers;

use App\Models\RegulationModel;
use App\Models\AdminActivityLogModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $model = new RegulationModel();

        // Menghitung total regulasi
        $total_regulations = $model->countAllResults();

        // Menghitung regulasi dengan kepatuhan 'Ya'
        $count_compliance_yes = $model->where('kepatuhan', 'Ya')->countAllResults();

        // Menghitung regulasi dengan kepatuhan 'Tidak'
        $count_compliance_no = $model->where('kepatuhan', 'Tidak')->countAllResults();

        $data = [
            'total_regulations' => $total_regulations,
            'count_compliance_yes' => $count_compliance_yes,
            'count_compliance_no' => $count_compliance_no
        ];

        return view('admin/dashboard', $data);
    }

    public function manage_regulation()
    {
        $model = new RegulationModel();
        $data['regulations'] = $model->findAll();

        return view('admin/manage_regulation', $data);
    }

    public function add_regulation()
    {
        return view('admin/add_regulation');
    }

    public function save_regulation()
    {
        $model = new RegulationModel();
        $data = [
            'jenis_peraturan' => $this->request->getVar('jenis_peraturan'),
            'nama_peraturan' => $this->request->getVar('nama_peraturan'),
            'fungsi_terkait' => $this->request->getVar('fungsi_terkait'),
            'kepatuhan' => $this->request->getVar('kepatuhan'),
            'isi_peraturan' => $this->request->getVar('isi_peraturan'),
            'poin_kritis' => $this->request->getVar('poin_kritis'),
            'instansi_penerbit' => $this->request->getVar('instansi_penerbit'),
            'analisis_risiko_uraian' => $this->request->getVar('analisis_risiko_uraian'),
            'analisis_risiko_kategori' => $this->request->getVar('analisis_risiko_kategori'),
            'analisis_risiko_skor' => $this->request->getVar('analisis_risiko_skor'),
            'analisis_peraturan_status' => $this->request->getVar('analisis_peraturan_status'),
            'dampak_finansial' => $this->request->getVar('dampak_finansial'),
            'dampak_pidana' => $this->request->getVar('dampak_pidana'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        
        if ($model->insert($data)) {
            // Logging aktivitas ke admin_activity_log
            $logData = [
                'idadmin' => session()->get('idadmin'),
                'aktivitas' => 'Menambah regulasi: ' . $data['nama_peraturan'],
                'idregulasi' => $model->insertID(),
                'created_at' => date('Y-m-d H:i:s'),
                'ip_address' => $this->request->getIPAddress()
            ];
            $logModel = model(AdminActivityLogModel::class);
            $logModel->insert($logData);
        }

        return redirect()->to(base_url('admin/manage_regulation'));
    }

    public function edit_regulation($id)
    {
        $model = new RegulationModel();
        $data['regulation'] = $model->find($id);

        return view('admin/edit_regulation', $data);
    }

    public function update_regulation()
    {
        $model = new RegulationModel();
        $id = $this->request->getVar('id');
        $data = [
            'jenis_peraturan' => $this->request->getVar('jenis_peraturan'),
            'nama_peraturan' => $this->request->getVar('nama_peraturan'),
            'fungsi_terkait' => $this->request->getVar('fungsi_terkait'),
            'kepatuhan' => $this->request->getVar('kepatuhan'),
            'isi_peraturan' => $this->request->getVar('isi_peraturan'),
            'poin_kritis' => $this->request->getVar('poin_kritis'),
            'instansi_penerbit' => $this->request->getVar('instansi_penerbit'),
            'analisis_risiko_uraian' => $this->request->getVar('analisis_risiko_uraian'),
            'analisis_risiko_kategori' => $this->request->getVar('analisis_risiko_kategori'),
            'analisis_risiko_skor' => $this->request->getVar('analisis_risiko_skor'),
            'analisis_peraturan_status' => $this->request->getVar('analisis_peraturan_status'),
            'dampak_finansial' => $this->request->getVar('dampak_finansial'),
            'dampak_pidana' => $this->request->getVar('dampak_pidana'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        
        if ($model->update($id, $data)) {
            // Logging aktivitas ke admin_activity_log
            $logData = [
                'idadmin' => session()->get('idadmin'),
                'aktivitas' => 'Memperbarui regulasi: ' . $data['nama_peraturan'],
                'idregulasi' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'ip_address' => $this->request->getIPAddress()
            ];
            $logModel = model(AdminActivityLogModel::class);
            $logModel->insert($logData);
        }

        return redirect()->to(base_url('admin/manage_regulation'));
    }

    public function delete_regulation($id)
    {
        $model = new RegulationModel();
        $regulasi = $model->find($id);
        
        if ($model->delete($id)) {
            // Logging aktivitas ke admin_activity_log
            $logData = [
                'idadmin' => session()->get('idadmin'),
                'aktivitas' => 'Menghapus regulasi: ' . $regulasi['nama_peraturan'],
                'idregulasi' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'ip_address' => $this->request->getIPAddress()
            ];
            $logModel = model(AdminActivityLogModel::class);
            $logModel->insert($logData);
        }

        return redirect()->to(base_url('admin/manage_regulation'));
    }
}
