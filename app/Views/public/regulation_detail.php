<?= $this->include('layouts/header') ?>

<div class="container">
    <h1>Detail of Regulation</h1>
    <table class="table table-bordered regulation-detail-table">
        <tr>
            <th>Jenis Peraturan</th>
            <td><?= esc($regulation->jenis_peraturan) ?></td>
        </tr>
        <tr>
            <th>Nama Peraturan</th>
            <td><?= esc($regulation->nama_peraturan) ?></td>
        </tr>
        <tr>
            <th>Isi Peraturan</th>
            <td><?= esc($regulation->isi_peraturan) ?></td>
        </tr>
        <tr>
            <th>Fungsi Terkait</th>
            <td><?= esc(implode(', ', $regulation->fungsi_terkait)) ?></td>
        </tr>
        <tr>
            <th>Kritikal Point</th>
            <td><?= esc($regulation->kritikal_point) ?></td>
        </tr>
        <tr>
            <th>Kepatuhan</th>
            <td><?= esc($regulation->kepatuhan) ?></td>
        </tr>
        <tr>
            <th>Instansi yang Mengeluarkan</th>
            <td><?= esc($regulation->instansi_yang_mengeluarkan) ?></td>
        </tr>
        <tr>
            <th>Analisa Resiko Peraturan (Uraian)</th>
            <td><?= esc($regulation->analisa_resiko_peraturan_uraian) ?></td>
        </tr>
        <tr>
            <th>Analisa Resiko Peraturan (Kategori)</th>
            <td><?= esc($regulation->analisa_resiko_peraturan_kategori) ?></td>
        </tr>
        <tr>
            <th>Analisa Resiko Peraturan (Skor)</th>
            <td><?= esc($regulation->analisa_resiko_peraturan_skor) ?></td>
        </tr>
        <tr>
            <th>Analisa Resiko Peraturan (Status)</th>
            <td><?= esc($regulation->analisa_resiko_peraturan_status) ?></td>
        </tr>
        <tr>
            <th>Dampak Finansial</th>
            <td><?= esc($regulation->dampak_finansial) ?></td>
        </tr>
        <tr>
            <th>Dampak Pidana</th>
            <td><?= esc($regulation->dampak_pidana) ?></td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td><?= esc($regulation->keterangan) ?></td>
        </tr>
    </table>
</div>

<?= $this->include('layouts/footer') ?>
