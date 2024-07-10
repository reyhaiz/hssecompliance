<?php

namespace App\Controllers;

use App\Models\RegulationModel;
use CodeIgniter\Controller;

class RegulationController extends BaseController
{
    protected $regulationModel;

    public function __construct()
    {
        $this->regulationModel = new RegulationModel();
    }

    public function index()
    {
        $regulations = $this->regulationModel->getAllRegulations();
        $data = [
            'regulations' => $regulations,
        ];
        return view('admin/manage_regulations', $data);
    }

    public function detail($id)
    {
        $regulation = $this->regulationModel->getRegulationById($id);
        if (!$regulation) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Regulation not found');
        }
        $data = [
            'regulation' => $regulation,
        ];
        return view('admin/regulation_detail', $data);
    }

    public function add()
    {
        return view('admin/regulation_form');
    }

    public function create()
    {
        $data = [
            'jenis_peraturan' => $this->request->getPost('jenis_peraturan'),
            'nama_peraturan' => $this->request->getPost('nama_peraturan'),
            'isi_peraturan' => $this->request->getPost('isi_peraturan'),
            'fungsi_terkait' => $this->request->getPost('fungsi_terkait'),
            'kritikal_point' => $this->request->getPost('kritikal_point'),
            'kepatuhan' => $this->request->getPost('kepatuhan'),
            'instansi_yang_mengeluarkan' => $this->request->getPost('instansi_yang_mengeluarkan'),
            'analisa_resiko_peraturan_uraian' => $this->request->getPost('analisa_resiko_peraturan_uraian'),
            'analisa_resiko_peraturan_kategori' => $this->request->getPost('analisa_resiko_peraturan_kategori'),
            'analisa_resiko_peraturan_skor' => $this->request->getPost('analisa_resiko_peraturan_skor'),
            'analisa_resiko_peraturan_status' => $this->request->getPost('analisa_resiko_peraturan_status'),
            'dampak_finansial' => $this->request->getPost('dampak_finansial'),
            'dampak_pidana' => $this->request->getPost('dampak_pidana'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $this->regulationModel->createRegulation($data);
        return redirect()->to('/regulations');
    }

    public function edit($id)
    {
        $regulation = $this->regulationModel->getRegulationById($id);
        if (!$regulation) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Regulation not found');
        }
        $data = [
            'regulation' => $regulation,
        ];
        return view('admin/regulation_form', $data);
    }

    public function update($id)
    {
        $data = [
            'jenis_peraturan' => $this->request->getPost('jenis_peraturan'),
            'nama_peraturan' => $this->request->getPost('nama_peraturan'),
            'isi_peraturan' => $this->request->getPost('isi_peraturan'),
            'fungsi_terkait' => $this->request->getPost('fungsi_terkait'),
            'kritikal_point' => $this->request->getPost('kritikal_point'),
            'kepatuhan' => $this->request->getPost('kepatuhan'),
            'instansi_yang_mengeluarkan' => $this->request->getPost('instansi_yang_mengeluarkan'),
            'analisa_resiko_peraturan_uraian' => $this->request->getPost('analisa_resiko_peraturan_uraian'),
            'analisa_resiko_peraturan_kategori' => $this->request->getPost('analisa_resiko_peraturan_kategori'),
            'analisa_resiko_peraturan_skor' => $this->request->getPost('analisa_resiko_peraturan_skor'),
            'analisa_resiko_peraturan_status' => $this->request->getPost('analisa_resiko_peraturan_status'),
            'dampak_finansial' => $this->request->getPost('dampak_finansial'),
            'dampak_pidana' => $this->request->getPost('dampak_pidana'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $this->regulationModel->updateRegulation($id, $data);
        return redirect()->to('/regulations');
    }

    public function delete($id)
    {
        $this->regulationModel->deleteRegulation($id);
        return redirect()->to('/regulations');
    }
}
