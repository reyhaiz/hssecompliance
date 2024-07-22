<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new RegulationModel();
        $data['regulations'] = $model->findAll();
        return view('public/home', $data);
    }

    public function detail($id)
    {
        $model = new RegulationModel();
        $data['regulation'] = $model->find($id);
        return view('public/detail_regulation', $data);
    }
}
