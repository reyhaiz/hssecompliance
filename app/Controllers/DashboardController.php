<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class DashboardController extends BaseController
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
            'totalRegulations' => count($regulations), // Hitung jumlah regulasi
        ];
        return view('dashboard', $data);
    }
}
