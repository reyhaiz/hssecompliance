<?php

namespace App\Models;

use CodeIgniter\Model;

class RegulationModel extends Model
{
    protected $table = 'regulasi';
    protected $primaryKey = 'idregulasi';
    protected $allowedFields = [
        'jenis_peraturan', 'nama_peraturan', 'fungsi_terkait', 
        'kepatuhan', 'isi_peraturan', 'poin_kritis', 'instansi_penerbit',
        'analisis_risiko_uraian', 'analisis_risiko_kategori', 'analisis_risiko_skor',
        'analisis_peraturan_status', 'dampak_finansial', 'dampak_pidana', 'keterangan',
        'formatted_id'
    ];

    public function getRegulationsWithSelectedColumns(){
        return $this->select('idregulasi, jenis_peraturan, nama_peraturan, fungsi_terkait, kepatuhan, isi_peraturan, poin_kritis, instansi_penerbit, analisis_risiko_uraian, analisis_risiko_kategori, analisis_risiko_skor, analisis_peraturan_status, dampak_finansial, dampak_pidana, keterangan')
                    ->findAll();
    }
}
