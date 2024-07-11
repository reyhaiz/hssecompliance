<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Regulation Detail</h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail of Regulation</h3>
                    <div class="card-tools">
                        <a href="<?= base_url('regulations') ?>" class="btn btn-primary">Back to Regulations</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Jenis Peraturan</th>
                            <td><?= esc($regulation->jenis_peraturan) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Nama Peraturan</th>
                            <td><?= esc($regulation->nama_peraturan) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Isi Peraturan</th>
                            <td><?= esc($regulation->isi_peraturan) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Fungsi Terkait</th>
                            <td>
                                <?php
                                if (is_array($regulation->fungsi_terkait)) {
                                    echo implode(', ', $regulation->fungsi_terkait);
                                } else {
                                    echo esc($regulation->fungsi_terkait) ?? '';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Kritikal Point</th>
                            <td><?= esc($regulation->kritikal_point) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Kepatuhan</th>
                            <td><?= esc($regulation->kepatuhan) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Instansi yang Mengeluarkan</th>
                            <td><?= esc($regulation->instansi_yang_mengeluarkan) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Analisa Resiko Peraturan (Uraian)</th>
                            <td><?= esc($regulation->analisa_resiko_peraturan_uraian) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Analisa Resiko Peraturan (Kategori)</th>
                            <td><?= esc($regulation->analisa_resiko_peraturan_kategori) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Analisa Resiko Peraturan (Skor)</th>
                            <td><?= esc($regulation->analisa_resiko_peraturan_skor) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Analisa Resiko Peraturan (Status)</th>
                            <td><?= esc($regulation->analisa_resiko_peraturan_status) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Dampak Finansial</th>
                            <td><?= esc($regulation->dampak_finansial) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Dampak Pidana</th>
                            <td><?= esc($regulation->dampak_pidana) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><?= esc($regulation->keterangan) ?? '' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('layouts/adminlte_footer') ?>
