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

    public function add()
    {
        return view('admin/regulation_form');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->regulationModel->insert($data);
        return redirect()->to('/regulations');
    }

    public function edit($id)
    {
        $regulation = $this->regulationModel->find($id);
        $data = [
            'regulation' => $regulation,
        ];
        return view('admin/regulation_form', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->regulationModel->update($id, $data);
        return redirect()->to('/regulations');
    }

    public function delete($id)
    {
        $this->regulationModel->delete($id);
        return redirect()->to('/regulations');
    }
}
