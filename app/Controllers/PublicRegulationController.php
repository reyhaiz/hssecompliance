<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class PublicRegulationController extends BaseController
{
    public function index()
    {
        $model = new RegulationModel();

        $perPage = $this->request->getGet('perPage') ?? 25; // Default 25
        $page = $this->request->getGet('page') ?? 1; // Default page 1

        $regulations = $model->paginate($perPage, 'regulations', $page);
        $pager = $model->pager;

        $complianceData = [
            'HSSE' => ['yes' => 0, 'no' => 0],
            'HR' => ['yes' => 0, 'no' => 0],
            'EP' => ['yes' => 0, 'no' => 0],
            'Operasi' => ['yes' => 0, 'no' => 0],
            'Finance' => ['yes' => 0, 'no' => 0],
            'WOWS' => ['yes' => 0, 'no' => 0],
            'PO' => ['yes' => 0, 'no' => 0],
            'RAM' => ['yes' => 0, 'no' => 0],
            'LR' => ['yes' => 0, 'no' => 0],
            'SCM' => ['yes' => 0, 'no' => 0],
            'HC' => ['yes' => 0, 'no' => 0],
            'ICT' => ['yes' => 0, 'no' => 0],
            'Semua Fungsi' => ['yes' => 0, 'no' => 0]
        ];

        foreach ($regulations as $regulation) {
            $functions = explode(',', $regulation['fungsi_terkait']);
            foreach ($functions as $function) {
                $function = trim($function);
                if (isset($complianceData[$function])) {
                    if ($regulation['kepatuhan'] == 'Ya') {
                        $complianceData[$function]['yes']++;
                    } else {
                        $complianceData[$function]['no']++;
                    }
                }
            }
        }

        $data = [
            'regulations' => $regulations,
            'complianceData' => $complianceData,
            'pager' => $pager,
            'perPage' => $perPage
        ];
        return view('public/home', $data);
    }
}
