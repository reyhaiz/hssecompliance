<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Regulation</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Regulation Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Jenis Peraturan</th>
                            <td><?= $regulation->jenis_peraturan ?></td>
                        </tr>
                        <tr>
                            <th>Tentang</th>
                            <td><?= $regulation->tentang ?></td>
                        </tr>
                        <tr>
                            <th>Isi Peraturan (Pasal-Pasal Terkait)</th>
                            <td><?= $regulation->isi_peraturan ?></td>
                        </tr>
                        <tr>
                            <th>Fungsi Terkait</th>
                            <td><?= $regulation->fungsi_terkait ?></td>
                        </tr>
                        <tr>
                            <th>Kritikal Point</th>
                            <td><?= $regulation->kritikal_point ?></td>
                        </tr>
                        <tr>
                            <th>Kepatuhan</th>
                            <td><?= $regulation->kepatuhan ?></td>
                        </tr>
                        <tr>
                            <th>Instansi yang Mengeluarkan</th>
                            <td><?= $regulation->instansi_yang_mengeluarkan ?></td>
                        </tr>
                        <tr>
                            <th>Analisa Resiko Peraturan (Uraian)</th>
                            <td><?= $regulation->analisa_resiko_peraturan_uraian ?></td>
                        </tr>
                        <tr>
                            <th>Analisa Resiko Peraturan (Kategori)</th>
                            <td><?= $regulation->analisa_resiko_peraturan_kategori ?></td>
                        </tr>
                        <tr>
                            <th>Analisa Resiko Peraturan (Skor)</th>
                            <td><?= $regulation->analisa_resiko_peraturan_skor ?></td>
                        </tr>
                        <tr>
                            <th>Analisa Resiko Peraturan (Status)</th>
                            <td><?= $regulation->analisa_resiko_peraturan_status ?></td>
                        </tr>
                        <tr>
                            <th>Dampak Finansial</th>
                            <td><?= $regulation->dampak_finansial ?></td>
                        </tr>
                        <tr>
                            <th>Dampak Pidana</th>
                            <td><?= $regulation->dampak_pidana ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><?= $regulation->keterangan ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('layouts/adminlte_footer') ?>
