<?= $this->include('layout/adminlte/adminlte_header') ?>
<?= $this->include('layout/adminlte/sidebar_admin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Regulation</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Regulation</li>
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
                    <form action="<?= base_url('admin/update_regulation') ?>" method="post">
                        <input type="hidden" name="id" value="<?= esc($regulation['id']) ?>">
                        <div class="form-group">
                            <label for="jenis_peraturan">Jenis Peraturan</label>
                            <input type="text" class="form-control" id="jenis_peraturan" name="jenis_peraturan" value="<?= esc($regulation['jenis_peraturan']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_peraturan">Nama Peraturan</label>
                            <input type="text" class="form-control" id="nama_peraturan" name="nama_peraturan" value="<?= esc($regulation['nama_peraturan']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="fungsi_terkait">Fungsi Terkait</label>
                            <input type="text" class="form-control" id="fungsi_terkait" name="fungsi_terkait" value="<?= esc($regulation['fungsi_terkait']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="kepatuhan">Kepatuhan</label>
                            <input type="text" class="form-control" id="kepatuhan" name="kepatuhan" value="<?= esc($regulation['kepatuhan']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="isi_peraturan">Isi Peraturan</label>
                            <textarea class="form-control" id="isi_peraturan" name="isi_peraturan"><?= esc($regulation['isi_peraturan']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="poin_kritis">Poin Kritis</label>
                            <textarea class="form-control" id="poin_kritis" name="poin_kritis"><?= esc($regulation['poin_kritis']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="instansi_penerbit">Instansi Penerbit</label>
                            <input type="text" class="form-control" id="instansi_penerbit" name="instansi_penerbit" value="<?= esc($regulation['instansi_penerbit']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_uraian">Analisis Risiko Uraian</label>
                            <textarea class="form-control" id="analisis_risiko_uraian" name="analisis_risiko_uraian"><?= esc($regulation['analisis_risiko_uraian']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_kategori">Analisis Risiko Kategori</label>
                            <input type="text" class="form-control" id="analisis_risiko_kategori" name="analisis_risiko_kategori" value="<?= esc($regulation['analisis_risiko_kategori']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_skor">Analisis Risiko Skor</label>
                            <input type="text" class="form-control" id="analisis_risiko_skor" name="analisis_risiko_skor" value="<?= esc($regulation['analisis_risiko_skor']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="analisis_peraturan_status">Analisis Peraturan Status</label>
                            <input type="text" class="form-control" id="analisis_peraturan_status" name="analisis_peraturan_status" value="<?= esc($regulation['analisis_peraturan_status']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="dampak_finansial">Dampak Finansial</label>
                            <input type="text" class="form-control" id="dampak_finansial" name="dampak_finansial" value="<?= esc($regulation['dampak_finansial']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="dampak_pidana">Dampak Pidana</label>
                            <input type="text" class="form-control" id="dampak_pidana" name="dampak_pidana" value="<?= esc($regulation['dampak_pidana']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"><?= esc($regulation['keterangan']) ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
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
