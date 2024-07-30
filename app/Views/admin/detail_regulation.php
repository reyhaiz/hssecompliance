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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= esc($regulation['nama_peraturan']) ?></h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Jenis Peraturan:</strong> <?= esc($regulation['jenis_peraturan']) ?></p>
                            <p><strong>Fungsi Terkait:</strong> <?= esc($regulation['fungsi_terkait']) ?></p>
                            <p><strong>Kepatuhan:</strong> <?= esc($regulation['kepatuhan']) ?></p>
                            <p><strong>Isi Peraturan:</strong> <?= esc($regulation['isi_peraturan']) ?></p>
                            <p><strong>Poin Kritis:</strong> <?= esc($regulation['poin_kritis']) ?></p>
                            <p><strong>Instansi Penerbit:</strong> <?= esc($regulation['instansi_penerbit']) ?></p>
                            <p><strong>Analisis Risiko Uraian:</strong> <?= esc($regulation['analisis_risiko_uraian']) ?></p>
                            <p><strong>Analisis Risiko Kategori:</strong> <?= esc($regulation['analisis_risiko_kategori']) ?></p>
                            <p><strong>Analisis Risiko Skor:</strong> <?= esc($regulation['analisis_risiko_skor']) ?></p>
                            <p><strong>Analisis Peraturan Status:</strong> <?= esc($regulation['analisis_peraturan_status']) ?></p>
                            <p><strong>Dampak Finansial:</strong> <?= esc($regulation['dampak_finansial']) ?></p>
                            <p><strong>Dampak Pidana:</strong> <?= esc($regulation['dampak_pidana']) ?></p>
                            <p><strong>Keterangan:</strong> <?= esc($regulation['keterangan']) ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('admin/manage_regulation') ?>" class="btn btn-primary">Back to List</a>
                        </div>
                    </div>
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
