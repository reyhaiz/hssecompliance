<?= $this->include('layout/adminlte/adminlte_header') ?>
<?= $this->include('layout/adminlte/sidebar_admin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Regulation</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Regulation</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
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
                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->include('layout/adminlte/adminlte_footer') ?>
