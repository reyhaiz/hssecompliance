<?= $this->include('layout/adminlte/header') ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
.back-button {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: black;
  margin-bottom: 20px;
}

.back-button span {
  font-size: 24px;
  margin-right: 5px;
}
</style>

<div class="main-container">
    <div class="d-flex align-items-center">
        <a href="/" class="back-button">
            <span class="material-symbols-outlined">arrow_back</span>
            Back
        </a>
        <h1 class="ml-3">Detail Regulation</h1>
    </div>
    <table class="detail-table">
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
            <th>Analisis Risiko Uraian</th>
            <td><?= esc($regulation['analisis_risiko_uraian']) ?></td>
        </tr>
        <tr>
            <th>Analisis Risiko Kategori</th>
            <td><?= esc($regulation['analisis_risiko_kategori']) ?></td>
        </tr>
        <tr>
            <th>Analisis Risiko Skor</th>
            <td><?= esc($regulation['analisis_risiko_skor']) ?></td>
        </tr>
        <tr>
            <th>Analisis Peraturan Status</th>
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
</div>

<?= $this->include('layout/adminlte/footer') ?>
