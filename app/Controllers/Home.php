<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new RegulationModel();
        $data['regulations'] = $model->getRegulationsWithSelectedColumns();
        return view('public/home', $data);
    }

    public function detail($idregulasi)
    {
        $model = new RegulationModel();
        $data['regulation'] = $model->find($idregulasi);
        return view('public/detail_regulation', $data);
    }
}
