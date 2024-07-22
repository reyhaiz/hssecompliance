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
        $regulations = $this->regulationModel->findAll();
        $data = [
            'regulations' => $regulations,
        ];
        return view('public/home', $data);
    }

    public function detail($id)
    {
        $regulation = $this->regulationModel->find($id);
        if (!$regulation) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Regulation not found');
        }
        $data = [
            'regulation' => $regulation,
        ];
        return view('public/detail_regulation', $data);
    }
}
