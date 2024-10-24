<?php

namespace App\Controllers;

use App\Models\RegulationModel;

class Admin extends BaseController
{
    protected $regulationModel;

    public function __construct()
    {
        // Memanggil model RegulationModel untuk digunakan pada fungsi-fungsi di controller ini
        $this->regulationModel = new RegulationModel();
    }

    public function dashboard()
    {
        // Menghitung jumlah total regulasi yang ada di database
        $totalRegulations = $this->regulationModel->countAllResults();

        // Menghitung jumlah regulasi yang memiliki kepatuhan "Ya"
        $countComplianceYes = $this->regulationModel->where('kepatuhan', 'Ya')->countAllResults();

        // Mengambil nama admin yang sedang login dari session
        $adminName = session()->get('nama_admin');

        // Menyiapkan data yang akan dikirim ke view dashboard
        $data = [
            'total_regulations' => $totalRegulations,
            'count_compliance_yes' => $countComplianceYes,
            'admin_name' => $adminName,
        ];

        // Menampilkan halaman dashboard dengan data yang sudah disiapkan
        return view('admin/dashboard', $data);
    }

    public function manage_regulation()
    {
        // Mengambil semua data regulasi yang ada di database
        $data['regulations'] = $this->regulationModel->findAll();

        // Menampilkan halaman manage_regulation dengan data regulasi
        return view('admin/manage_regulation', $data);
    }

    public function add_regulation()
    {
        // Menampilkan halaman form tambah regulasi
        return view('admin/add_regulation');
    }

    public function save_regulation()
    {
        // Mengambil data dari form input dan menyimpan ke dalam array
        $data = [
            'jenis_peraturan' => $this->request->getVar('jenis_peraturan'),
            'nama_peraturan' => $this->request->getVar('nama_peraturan'),
            'fungsi_terkait' => implode(',', $this->request->getVar('fungsi_terkait')),
            'kepatuhan' => $this->request->getVar('kepatuhan'),
            'isi_peraturan' => $this->request->getVar('isi_peraturan'),
            'poin_kritis' => $this->request->getVar('poin_kritis'),
            'instansi_penerbit' => $this->request->getVar('instansi_penerbit'),
            'analisis_risiko_uraian' => $this->request->getVar('analisis_risiko_uraian'),
            'analisis_risiko_kategori' => $this->request->getVar('analisis_risiko_kategori'),
            'analisis_risiko_skor' => $this->request->getVar('analisis_risiko_skor'),
            'analisis_peraturan_status' => $this->request->getVar('analisis_peraturan_status'),
            'dampak_finansial' => $this->request->getVar('dampak_finansial'),
            'dampak_pidana' => $this->request->getVar('dampak_pidana'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];

        // Memasukkan data ke dalam database
        if ($this->regulationModel->insert($data)) {
            return redirect()->to(base_url('admin/manage_regulation'))->with('success', 'Regulasi berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan regulasi.');
        }
    }

    public function edit_regulation($id)
    {
        // Mengambil data regulasi berdasarkan ID yang dikirim
        $data['regulation'] = $this->regulationModel->find($id);

        // Menampilkan halaman edit regulasi dengan data regulasi
        return view('admin/edit_regulation', $data);
    }

    public function update_regulation()
    {
        // Mengambil ID regulasi yang akan diperbarui
        $id = $this->request->getVar('id');

        // Mengambil data dari form input dan menyimpan ke dalam array
        $data = [
            'jenis_peraturan' => $this->request->getVar('jenis_peraturan'),
            'nama_peraturan' => $this->request->getVar('nama_peraturan'),
            'fungsi_terkait' => implode(',', $this->request->getVar('fungsi_terkait')),
            'kepatuhan' => $this->request->getVar('kepatuhan'),
            'isi_peraturan' => $this->request->getVar('isi_peraturan'),
            'poin_kritis' => $this->request->getVar('poin_kritis'),
            'instansi_penerbit' => $this->request->getVar('instansi_penerbit'),
            'analisis_risiko_uraian' => $this->request->getVar('analisis_risiko_uraian'),
            'analisis_risiko_kategori' => $this->request->getVar('analisis_risiko_kategori'),
            'analisis_risiko_skor' => $this->request->getVar('analisis_risiko_skor'),
            'analisis_peraturan_status' => $this->request->getVar('analisis_peraturan_status'),
            'dampak_finansial' => $this->request->getVar('dampak_finansial'),
            'dampak_pidana' => $this->request->getVar('dampak_pidana'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];

        // Memperbarui data regulasi berdasarkan ID
        if ($this->regulationModel->update($id, $data)) {
            return redirect()->to(base_url('admin/manage_regulation'))->with('success', 'Regulasi berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui regulasi.');
        }
    }

    public function delete_regulation($id)
    {
        // Menghapus regulasi berdasarkan ID yang dikirim
        $this->regulationModel->delete($id);

        // Redirect kembali ke halaman manage regulation dengan pesan sukses
        return redirect()->to(base_url('admin/manage_regulation'))->with('success', 'Regulasi berhasil dihapus.');
    }
}
