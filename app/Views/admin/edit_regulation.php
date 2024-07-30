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
                            <select class="form-control" id="jenis_peraturan" name="jenis_peraturan">
                                <option value="Undang-Undang" <?= $regulation['jenis_peraturan'] == 'Undang-Undang' ? 'selected' : '' ?>>Undang-Undang</option>
                                <option value="Peraturan Pemerintah" <?= $regulation['jenis_peraturan'] == 'Peraturan Pemerintah' ? 'selected' : '' ?>>Peraturan Pemerintah</option>
                                <option value="Peraturan Presiden & Menteri" <?= $regulation['jenis_peraturan'] == 'Peraturan Presiden & Menteri' ? 'selected' : '' ?>>Peraturan Presiden & Menteri</option>
                                <option value="Keputusan Presiden Menteri" <?= $regulation['jenis_peraturan'] == 'Keputusan Presiden Menteri' ? 'selected' : '' ?>>Keputusan Presiden Menteri</option>
                                <option value="Persyaratan Lainnya" <?= $regulation['jenis_peraturan'] == 'Persyaratan Lainnya' ? 'selected' : '' ?>>Persyaratan Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_peraturan">Nama Peraturan</label>
                            <input type="text" class="form-control" id="nama_peraturan" name="nama_peraturan" maxlength="264" value="<?= esc($regulation['nama_peraturan']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="fungsi_terkait">Fungsi Terkait</label>
                            <div class="checkbox">
                                <label><input type="checkbox" name="fungsi_terkait[]" value="EP" <?= in_array('EP', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> EP</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="WOWS" <?= in_array('WOWS', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> WOWS</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="PO" <?= in_array('PO', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> PO</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="RAM" <?= in_array('RAM', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> RAM</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="LR" <?= in_array('LR', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> LR</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="HSSE" <?= in_array('HSSE', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> HSSE</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="SCM" <?= in_array('SCM', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> SCM</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="Finance" <?= in_array('Finance', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> Finance</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="HC" <?= in_array('HC', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> HC</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="ICT" <?= in_array('ICT', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> ICT</label>
                                <label><input type="checkbox" name="fungsi_terkait[]" value="Semua Fungsi" <?= in_array('Semua Fungsi', explode(',', $regulation['fungsi_terkait'])) ? 'checked' : '' ?>> Semua Fungsi</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kepatuhan">Kepatuhan</label>
                            <select class="form-control" id="kepatuhan" name="kepatuhan">
                                <option value="Ya" <?= $regulation['kepatuhan'] == 'Ya' ? 'selected' : '' ?>>Ya</option>
                                <option value="Tidak" <?= $regulation['kepatuhan'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="isi_peraturan">Isi Peraturan</label>
                            <textarea class="form-control" id="isi_peraturan" name="isi_peraturan" maxlength="1000"><?= esc($regulation['isi_peraturan']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="poin_kritis">Poin Kritis</label>
                            <textarea class="form-control" id="poin_kritis" name="poin_kritis"><?= esc($regulation['poin_kritis']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="instansi_penerbit">Instansi Penerbit</label>
                            <input type="text" class="form-control" id="instansi_penerbit" name="instansi_penerbit" maxlength="200" value="<?= esc($regulation['instansi_penerbit']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_uraian">Analisis Risiko Uraian</label>
                            <textarea class="form-control" id="analisis_risiko_uraian" name="analisis_risiko_uraian" maxlength="600"><?= esc($regulation['analisis_risiko_uraian']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_kategori">Analisis Risiko Kategori</label>
                            <select class="form-control" id="analisis_risiko_kategori" name="analisis_risiko_kategori">
                                <option value="A" <?= $regulation['analisis_risiko_kategori'] == 'A' ? 'selected' : '' ?>>A</option>
                                <option value="B" <?= $regulation['analisis_risiko_kategori'] == 'B' ? 'selected' : '' ?>>B</option>
                                <option value="C" <?= $regulation['analisis_risiko_kategori'] == 'C' ? 'selected' : '' ?>>C</option>
                                <option value="D" <?= $regulation['analisis_risiko_kategori'] == 'D' ? 'selected' : '' ?>>D</option>
                                <option value="E" <?= $regulation['analisis_risiko_kategori'] == 'E' ? 'selected' : '' ?>>E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_skor">Analisis Risiko Skor</label>
                            <select class="form-control" id="analisis_risiko_skor" name="analisis_risiko_skor">
                                <option value="0" <?= $regulation['analisis_risiko_skor'] == '0' ? 'selected' : '' ?>>0</option>
                                <option value="1" <?= $regulation['analisis_risiko_skor'] == '1' ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= $regulation['analisis_risiko_skor'] == '2' ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= $regulation['analisis_risiko_skor'] == '3' ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= $regulation['analisis_risiko_skor'] == '4' ? 'selected' : '' ?>>4</option>
                                <option value="5" <?= $regulation['analisis_risiko_skor'] == '5' ? 'selected' : '' ?>>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="analisis_peraturan_status">Analisis Peraturan Status</label>
                            <select class="form-control" id="analisis_peraturan_status" name="analisis_peraturan_status">
                                <option value="R" <?= $regulation['analisis_peraturan_status'] == 'R' ? 'selected' : '' ?>>R</option>
                                <option value="S" <?= $regulation['analisis_peraturan_status'] == 'S' ? 'selected' : '' ?>>S</option>
                                <option value="T" <?= $regulation['analisis_peraturan_status'] == 'T' ? 'selected' : '' ?>>T</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dampak_finansial">Dampak Finansial</label>
                            <input type="text" class="form-control" id="dampak_finansial" name="dampak_finansial" maxlength="200" value="<?= esc($regulation['dampak_finansial']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="dampak_pidana">Dampak Pidana</label>
                            <input type="text" class="form-control" id="dampak_pidana" name="dampak_pidana" maxlength="200" value="<?= esc($regulation['dampak_pidana']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" maxlength="400"><?= esc($regulation['keterangan']) ?></textarea>
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
