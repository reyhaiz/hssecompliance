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
        $data['regulations'] = $this->regulationModel->getAllRegulations();
        return view('dashboard', $data);
    }
}
