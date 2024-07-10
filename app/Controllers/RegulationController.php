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
        $data = $this->request->getPost();
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
        $data = $this->request->getPost();
        $this->regulationModel->updateRegulation($id, $data);
        return redirect()->to('/regulations');
    }

    public function delete($id)
    {
        $this->regulationModel->deleteRegulation($id);
        return redirect()->to('/regulations');
    }
}
