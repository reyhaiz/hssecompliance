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
        try {
            $data['regulations'] = $this->regulationModel->getAllRegulations();
            return view('admin/manage_regulations', $data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return view('errors/html/error_500');
        }
    }

    public function add()
    {
        log_message('debug', 'Navigating to add regulation form');
        return view('admin/regulation_form');
    }

    public function create()
    {
        $data = [
            'jenis_peraturan' => $this->request->getPost('jenis_peraturan'),
            'nama_peraturan' => $this->request->getPost('nama_peraturan'),
            'fungsi_terkait' => $this->request->getPost('fungsi_terkait'),
            'kepatuhan' => $this->request->getPost('kepatuhan')
        ];
        $this->regulationModel->insertRegulation($data);
        return redirect()->to('/regulations');
    }

    public function edit($id)
    {
        // Logic for editing regulation
    }

    public function update($id)
    {
        // Logic for updating regulation
    }

    public function delete($id)
    {
        $this->regulationModel->deleteRegulation($id);
        return redirect()->to('/regulations');
    }
}
