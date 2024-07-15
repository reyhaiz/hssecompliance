<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class PublicRegulationController extends BaseController
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
        return view('home', $data);
    }

    public function detail($id)
    {
        $regulation = $this->regulationModel->getRegulationById($id);
        $data = [
            'regulation' => $regulation,
        ];
        return view('public/regulation_detail', $data);
    }
}