<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard');
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
            'analisis_risiko' => $this->request->getVar('analisis_risiko'),
            'dampak_finansial' => $this->request->getVar('dampak_finansial'),
            'dampak_pidana' => $this->request->getVar('dampak_pidana'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        $model->insert($data);
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
            'analisis_risiko' => $this->request->getVar('analisis_risiko'),
            'dampak_finansial' => $this->request->getVar('dampak_finansial'),
            'dampak_pidana' => $this->request->getVar('dampak_pidana'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        $model->update($id, $data);
        return redirect()->to(base_url('admin/manage_regulation'));
    }

    public function delete_regulation($id)
    {
        $model = new RegulationModel();
        $model->delete($id);
        return redirect()->to('/admin/manage_regulation');
    }

    public function detail_regulation($id)
    {
        $model = new RegulationModel();
        $data['regulation'] = $model->find($id);
        return view('admin/detail_regulation', $data);
    }
}
