<?php

namespace App\Models;

use CodeIgniter\Model;

class RegulationModel extends Model
{
    protected $table = 'regulations';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'jenis_peraturan', 'nama_peraturan', 'isi_peraturan', 
        'fungsi_terkait', 'kritikal_point', 'kepatuhan', 
        'instansi_yang_mengeluarkan', 'analisa_resiko_peraturan_uraian', 
        'analisa_resiko_peraturan_kategori', 'analisa_resiko_peraturan_skor', 
        'analisa_resiko_peraturan_status', 'dampak_finansial', 'dampak_pidana', 
        'keterangan'
    ];

    public function getAllRegulations()
    {
        return $this->findAll();
    }

    public function getRegulationById($id)
    {
        return $this->find($id);
    }

    public function createRegulation($data)
    {
        return $this->insert($data);
    }

    public function updateRegulation($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRegulation($id)
    {
        return $this->delete($id);
    }
}
