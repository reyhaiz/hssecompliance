<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Regulation</title>
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include(APPPATH . 'Views/layout/adminlte/header.php'); ?>
    <?php include(APPPATH . 'Views/layout/adminlte/sidebar_admin.php'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Regulation</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Regulation Details</h3>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-3">Jenis Peraturan</dt>
                                    <dd class="col-sm-9"><?= $regulation['jenis_peraturan'] ?></dd>
                                    <dt class="col-sm-3">Nama Peraturan</dt>
                                    <dd class="col-sm-9"><?= $regulation['nama_peraturan'] ?></dd>
                                    <dt class="col-sm-3">Fungsi Terkait</dt>
                                    <dd class="col-sm-9"><?= $regulation['fungsi_terkait'] ?></dd>
                                    <dt class="col-sm-3">Kepatuhan</dt>
                                    <dd class="col-sm-9"><?= $regulation['kepatuhan'] ?></dd>
                                    <dt class="col-sm-3">Isi Peraturan</dt>
                                    <dd class="col-sm-9"><?= $regulation['isi_peraturan'] ?></dd>
                                    <dt class="col-sm-3">Poin Kritis</dt>
                                    <dd class="col-sm-9"><?= $regulation['poin_kritis'] ?></dd>
                                    <dt class="col-sm-3">Instansi Penerbit</dt>
                                    <dd class="col-sm-9"><?= $regulation['instansi_penerbit'] ?></dd>
                                    <dt class="col-sm-3">Analisis Risiko</dt>
                                    <dd class="col-sm-9"><?= $regulation['analisis_risiko'] ?></dd>
                                    <dt class="col-sm-3">Dampak Finansial</dt>
                                    <dd class="col-sm-9"><?= $regulation['dampak_finansial'] ?></dd>
                                    <dt class="col-sm-3">Dampak Pidana</dt>
                                    <dd class="col-sm-9"><?= $regulation['dampak_pidana'] ?></dd>
                                    <dt class="col-sm-3">Keterangan</dt>
                                    <dd class="col-sm-9"><?= $regulation['keterangan'] ?></dd>
                                </dl>
                                <a href="<?= base_url('admin/edit_regulation/'.$regulation['id']) ?>" class="btn btn-warning">Edit</a>
                                <a href="<?= base_url('admin/manage_regulation') ?>" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include(APPPATH . 'Views/layout/adminlte/footer.php'); ?>
</div>
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
