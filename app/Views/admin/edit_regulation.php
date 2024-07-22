<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Regulation</title>
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
                        <h1 class="m-0">Edit Regulation</h1>
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
                                <h3 class="card-title">Update Regulation</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('admin/update_regulation') ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $regulation['id'] ?>">
                                    <div class="form-group">
                                        <label for="jenis_peraturan">Jenis Peraturan</label>
                                        <input type="text" class="form-control" id="jenis_peraturan" name="jenis_peraturan" value="<?= $regulation['jenis_peraturan'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_peraturan">Nama Peraturan</label>
                                        <input type="text" class="form-control" id="nama_peraturan" name="nama_peraturan" value="<?= $regulation['nama_peraturan'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fungsi_terkait">Fungsi Terkait</label>
                                        <input type="text" class="form-control" id="fungsi_terkait" name="fungsi_terkait" value="<?= $regulation['fungsi_terkait'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kepatuhan">Kepatuhan</label>
                                        <input type="text" class="form-control" id="kepatuhan" name="kepatuhan" value="<?= $regulation['kepatuhan'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="isi_peraturan">Isi Peraturan</label>
                                        <textarea class="form-control" id="isi_peraturan" name="isi_peraturan" rows="3" required><?= $regulation['isi_peraturan'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="poin_kritis">Poin Kritis</label>
                                        <textarea class="form-control" id="poin_kritis" name="poin_kritis" rows="3"><?= $regulation['poin_kritis'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="instansi_penerbit">Instansi Penerbit</label>
                                        <input type="text" class="form-control" id="instansi_penerbit" name="instansi_penerbit" value="<?= $regulation['instansi_penerbit'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="analisis_risiko">Analisis Risiko</label>
                                        <textarea class="form-control" id="analisis_risiko" name="analisis_risiko" rows="3"><?= $regulation['analisis_risiko'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="dampak_finansial">Dampak Finansial</label>
                                        <input type="text" class="form-control" id="dampak_finansial" name="dampak_finansial" value="<?= $regulation['dampak_finansial'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="dampak_pidana">Dampak Pidana</label>
                                        <input type="text" class="form-control" id="dampak_pidana" name="dampak_pidana" value="<?= $regulation['dampak_pidana'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $regulation['keterangan'] ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
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
