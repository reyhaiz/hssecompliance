<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Regulation</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Regulation</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('regulation/create') ?>" method="post">
                        <div class="form-group">
                            <label for="jenis_peraturan">Jenis Peraturan</label>
                            <select class="form-control" id="jenis_peraturan" name="jenis_peraturan" required>
                                <option value="Undang-undang">Undang-undang</option>
                                <option value="Peraturan Pemerintah">Peraturan Pemerintah</option>
                                <option value="Peraturan Presiden & Menteri">Peraturan Presiden & Menteri</option>
                                <option value="Keputusan Presiden & Menteri">Keputusan Presiden & Menteri</option>
                                <option value="Persyaratan Lainnya">Persyaratan Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tentang">Tentang</label>
                            <input type="text" class="form-control" id="tentang" name="tentang" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="isi_peraturan">Isi Peraturan (Pasal-Pasal Terkait)</label>
                            <input type="text" class="form-control" id="isi_peraturan" name="isi_peraturan" maxlength="400" required>
                        </div>
                        <div class="form-group">
                            <label for="fungsi_terkait">Fungsi Terkait</label>
                            <input type="text" class="form-control" id="fungsi_terkait" name="fungsi_terkait" required>
                        </div>
                        <div class="form-group">
                            <label for="kritikal_point">Kritikal Point</label>
                            <input type="text" class="form-control" id="kritikal_point" name="kritikal_point" maxlength="400" required>
                        </div>
                        <div class="form-group">
                            <label for="kepatuhan">Kepatuhan</label>
                            <select class="form-control" id="kepatuhan" name="kepatuhan" required>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="instansi_yang_mengeluarkan">Instansi yang Mengeluarkan</label>
                            <input type="text" class="form-control" id="instansi_yang_mengeluarkan" name="instansi_yang_mengeluarkan" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="analisa_resiko_peraturan_uraian">Analisa Resiko Peraturan (Uraian)</label>
                            <input type="text" class="form-control" id="analisa_resiko_peraturan_uraian" name="analisa_resiko_peraturan_uraian" maxlength="600" required>
                        </div>
                        <div class="form-group">
                            <label for="analisa_resiko_peraturan_kategori">Analisa Resiko Peraturan (Kategori)</label>
                            <select class="form-control" id="analisa_resiko_peraturan_kategori" name="analisa_resiko_peraturan_kategori" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="analisa_resiko_peraturan_skor">Analisa Resiko Peraturan (Skor)</label>
                            <select class="form-control" id="analisa_resiko_peraturan_skor" name="analisa_resiko_peraturan_skor" required>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="analisa_resiko_peraturan_status">Analisa Resiko Peraturan (Status)</label>
                            <select class="form-control" id="analisa_resiko_peraturan_status" name="analisa_resiko_peraturan_status" required>
                                <option value="R">R</option>
                                <option value="S">S</option>
                                <option value="T">T</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dampak_finansial">Dampak Finansial</label>
                            <input type="text" class="form-control" id="dampak_finansial" name="dampak_finansial" maxlength="400" required>
                        </div>
                        <div class="form-group">
                            <label for="dampak_pidana">Dampak Pidana</label>
                            <input type="text" class="form-control" id="dampak_pidana" name="dampak_pidana" maxlength="400" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="400" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('layouts/adminlte_footer') ?>
