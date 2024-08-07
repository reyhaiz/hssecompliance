<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class PublicRegulationController extends BaseController
{
    public function index()
    {
        $model = new RegulationModel();
        $regulations = $model->findAll();

        $complianceData = [
            'HSSE' => ['yes' => 0, 'no' => 0],
            'HR' => ['yes' => 0, 'no' => 0],
            'EP' => ['yes' => 0, 'no' => 0],
            'Operasi' => ['yes' => 0, 'no' => 0]
        ];

        foreach ($regulations as $regulation) {
            $functions = explode(',', $regulation['fungsi_terkait']);
            foreach ($functions as $function) {
                $function = trim($function);
                if ($regulation['kepatuhan'] == 'Ya') {
                    $complianceData[$function]['yes']++;
                } else {
                    $complianceData[$function]['no']++;
                }
            }
        }

        $data = [
            'regulations' => $regulations,
            'complianceData' => $complianceData
        ];
        return view('public/home', $data);
    }
}
