<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class RegulationController extends BaseController
{
    protected $regulationModel;

    public function __construct()
    {
        $this->regulationModel = new RegulationModel();
    }

    public function index()
    {
        $regulations = $this->regulationModel->findAll();
        $data = [
            'regulations' => $regulations,
        ];
        return view('admin/manage_regulations', $data);
    }

    public function detail($id)
    {
        $regulation = $this->regulationModel->find($id);
        $data = [
            'regulation' => $regulation,
        ];
        return view('admin/detail_regulation', $data);
    }

    public function add_regulation()
    {
        return view('admin/add_regulation');
    }

    public function save_regulation()
    {
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
        $this->regulationModel->insert($data);
        return redirect()->to(base_url('regulation/index'));
    }

    public function edit_regulation($id)
    {
        $data['regulation'] = $this->regulationModel->find($id);
        return view('admin/edit_regulation', $data);
    }

    public function update_regulation()
    {
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
        $this->regulationModel->update($id, $data);
        return redirect()->to(base_url('regulation/index'));
    }

    public function delete_regulation($id)
    {
        $this->regulationModel->delete($id);
        return redirect()->to(base_url('regulation/index'));
    }
}
