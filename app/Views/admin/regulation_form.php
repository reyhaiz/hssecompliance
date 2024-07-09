<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= isset($regulation) ? 'Edit Regulation' : 'Add Regulation' ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= isset($regulation) ? '/regulations/update/' . (string) $regulation['_id'] : '/regulations/create' ?>" method="post">
                                <div class="form-group">
                                    <label for="jenis_peraturan">Jenis Peraturan</label>
                                    <select class="form-control" id="jenis_peraturan" name="jenis_peraturan" required>
                                        <option value="undang-undang">Undang-Undang</option>
                                        <option value="peraturan_pemerintah">Peraturan Pemerintah</option>
                                        <option value="peraturan_presiden_menteri">Peraturan Presiden & Menteri</option>
                                        <option value="keputusan_presiden_menteri">Keputusan Presiden & Menteri</option>
                                        <option value="persyaratan_l
                                        <option value="persyaratan_lainnya">Persyaratan Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_peraturan">Nama Peraturan</label>
                                    <input type="text" class="form-control" id="nama_peraturan" name="nama_peraturan" maxlength="209" value="<?= isset($regulation) ? $regulation['nama_peraturan'] : '' ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="fungsi_terkait">Fungsi Terkait</label>
                                    <input type="text" class="form-control" id="fungsi_terkait" name="fungsi_terkait" value="<?= isset($regulation) ? $regulation['fungsi_terkait'] : '' ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="kepatuhan">Kepatuhan</label>
                                    <select class="form-control" id="kepatuhan" name="kepatuhan" required>
                                        <option value="ya">Ya</option>
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><?= isset($regulation) ? 'Update' : 'Add' ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->include('layouts/adminlte_footer') ?>
