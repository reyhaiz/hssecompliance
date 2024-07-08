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
        $data['regulations'] = $this->regulationModel->getAllRegulations();
        return view('regulations/index', $data);
    }

    public function create()
    {
        // Logic for creating regulation
    }

    public function update($id)
    {
        // Logic for updating regulation
    }

    public function delete($id)
    {
        // Logic for deleting regulation
    }
}
