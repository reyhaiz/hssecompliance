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
        return view('admin/regulation_detail', $data);
    }
}
