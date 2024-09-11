<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class PublicRegulationController extends BaseController
{
    public function index()
    {
        $model = new RegulationModel();
        $regulations = $model->getRegulationsWithSelectedColumns();

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
        ];

        return view('public/home', $data);
    }

    public function detail($idregulasi)
    {
        $model = new RegulationModel();
        $regulation = $model->find($idregulasi);

        if (!$regulation) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'regulation' => $regulation
        ];

        return view('public/detail_regulation', $data);
    }

    public function about()
    {
        return view('public/about');
    }
}
