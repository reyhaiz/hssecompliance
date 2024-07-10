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
        echo view('layouts/adminlte_header');
        echo view('layouts/sidebar');
        echo view('admin/manage_regulations', $data);
        echo view('layouts/adminlte_footer');
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
        echo view('layouts/adminlte_header');
        echo view('layouts/sidebar');
        echo view('admin/regulation_detail', $data);
        echo view('layouts/adminlte_footer');
    }

    public function add()
    {
        echo view('layouts/adminlte_header');
        echo view('layouts/sidebar');
        echo view('admin/regulation_form');
        echo view('layouts/adminlte_footer');
    }

    public function create()
    {
        $data = [
            'jenis_peraturan' => $this->request->getPost('jenis_peraturan'),
            'nama_peraturan' => $this->request->getPost('nama_peraturan'),
            'fungsi_terkait' => $this->request->getPost('fungsi_terkait'),
            'kepatuhan' => $this->request->getPost('kepatuhan'),
        ];
        $this->regulationModel->createRegulation($data);
        return redirect()->to('/regulation');
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
        echo view('layouts/adminlte_header');
        echo view('layouts/sidebar');
        echo view('admin/regulation_form', $data);
        echo view('layouts/adminlte_footer');
    }

    public function update($id)
    {
        $data = [
            'jenis_peraturan' => $this->request->getPost('jenis_peraturan'),
            'nama_peraturan' => $this->request->getPost('nama_peraturan'),
            'fungsi_terkait' => $this->request->getPost('fungsi_terkait'),
            'kepatuhan' => $this->request->getPost('kepatuhan'),
        ];
        $this->regulationModel->updateRegulation($id, $data);
        return redirect()->to('/regulation');
    }

    public function delete($id)
    {
        $this->regulationModel->deleteRegulation($id);
        return redirect()->to('/regulation');
    }
}
