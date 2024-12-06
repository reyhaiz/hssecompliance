<?= $this->include('layout/adminlte/adminlte_header') ?>
<?= $this->include('layout/adminlte/sidebar_admin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Regulation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Regulation</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Tampilkan pesan error jika ada -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/save_regulation') ?>" method="post">
                        <div class="form-group">
                            <label for="jenis_peraturan">Jenis Peraturan</label>
                            <select class="form-control" id="jenis_peraturan" name="jenis_peraturan">
                                <option value="Undang-Undang">Undang-Undang</option>
                                <option value="Peraturan Pemerintah">Peraturan Pemerintah</option>
                                <option value="Peraturan Presiden & Menteri">Peraturan Presiden & Menteri</option>
                                <option value="Keputusan Presiden Menteri">Keputusan Presiden Menteri</option>
                                <option value="Persyaratan Lainnya">Persyaratan Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_peraturan">Nama Peraturan</label>
                            <input type="text" class="form-control" id="nama_peraturan" name="nama_peraturan" maxlength="264">
                        </div>
                        <div class="form-group">
                            <label for="fungsi_terkait">Fungsi Terkait</label><br>
                            <input type="checkbox" name="fungsi_terkait[]" value="EP"> EP<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="WOWS"> WOWS<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="PO"> PO<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="RAM"> RAM<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="LR"> LR<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="HSSE"> HSSE<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="SCM"> SCM<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="Finance"> Finance<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="HC"> HC<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="ICT"> ICT<br>
                            <input type="checkbox" name="fungsi_terkait[]" value="Semua Fungsi"> Semua Fungsi<br>
                        </div>
                        <div class="form-group">
                            <label for="kepatuhan">Kepatuhan</label>
                            <select class="form-control" id="kepatuhan" name="kepatuhan">
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="isi_peraturan">Isi Peraturan</label>
                            <textarea class="form-control" id="isi_peraturan" name="isi_peraturan" maxlength="1000"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="poin_kritis">Poin Kritis</label>
                            <textarea class="form-control" id="poin_kritis" name="poin_kritis"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="instansi_penerbit">Instansi Penerbit</label>
                            <input type="text" class="form-control" id="instansi_penerbit" name="instansi_penerbit" maxlength="200">
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_uraian">Analisis Risiko Uraian</label>
                            <textarea class="form-control" id="analisis_risiko_uraian" name="analisis_risiko_uraian" maxlength="600"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_kategori">Analisis Risiko Kategori</label>
                            <select class="form-control" id="analisis_risiko_kategori" name="analisis_risiko_kategori">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="analisis_risiko_skor">Analisis Risiko Skor</label>
                            <select class="form-control" id="analisis_risiko_skor" name="analisis_risiko_skor">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="analisis_peraturan_status">Analisis Peraturan Status</label>
                            <select class="form-control" id="analisis_peraturan_status" name="analisis_peraturan_status">
                                <option value="R">R</option>
                                <option value="S">S</option>
                                <option value="T">T</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dampak_finansial">Dampak Finansial</label>
                            <input type="text" class="form-control" id="dampak_finansial" name="dampak_finansial" maxlength="200">
                        </div>
                        <div class="form-group">
                            <label for="dampak_pidana">Dampak Pidana</label>
                            <input type="text" class="form-control" id="dampak_pidana" name="dampak_pidana" maxlength="200">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" maxlength="400"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('layout/adminlte/adminlte_footer') ?>
