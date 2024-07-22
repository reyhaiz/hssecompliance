<?= $this->include('public/header') ?>

<div class="container">
    <h1>Detail of Regulation</h1>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <td><?= esc($regulation['id']) ?></td>
        </tr>
        <tr>
            <th>Jenis Peraturan</th>
            <td><?= esc($regulation['jenis_peraturan']) ?></td>
        </tr>
        <tr>
            <th>Nama Peraturan</th>
            <td><?= esc($regulation['nama_peraturan']) ?></td>
        </tr>
        <tr>
            <th>Fungsi Terkait</th>
            <td><?= esc($regulation['fungsi_terkait']) ?></td>
        </tr>
        <tr>
            <th>Kepatuhan</th>
            <td><?= esc($regulation['kepatuhan']) ?></td>
        </tr>
        <tr>
            <th>Isi Peraturan</th>
            <td><?= esc($regulation['isi_peraturan']) ?></td>
        </tr>
        <tr>
            <th>Poin Kritis</th>
            <td><?= esc($regulation['poin_kritis']) ?></td>
        </tr>
        <tr>
            <th>Instansi Penerbit</th>
            <td><?= esc($regulation['instansi_penerbit']) ?></td>
        </tr>
        <tr>
            <th>Analisis Risiko (Uraian)</th>
            <td><?= esc($regulation['analisis_risiko_uraian']) ?></td>
        </tr>
        <tr>
            <th>Analisis Risiko (Kategori)</th>
            <td><?= esc($regulation['analisis_risiko_kategori']) ?></td>
        </tr>
        <tr>
            <th>Analisis Risiko (Skor)</th>
            <td><?= esc($regulation['analisis_risiko_skor']) ?></td>
        </tr>
        <tr>
            <th>Analisis Peraturan (Status)</th>
            <td><?= esc($regulation['analisis_peraturan_status']) ?></td>
        </tr>
        <tr>
            <th>Dampak Finansial</th>
            <td><?= esc($regulation['dampak_finansial']) ?></td>
        </tr>
        <tr>
            <th>Dampak Pidana</th>
            <td><?= esc($regulation['dampak_pidana']) ?></td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td><?= esc($regulation['keterangan']) ?></td>
        </tr>
    </table>
    <a href="<?= base_url() ?>" class="btn btn-secondary">Back</a>
</div>

<?= $this->include('public/footer') ?>
