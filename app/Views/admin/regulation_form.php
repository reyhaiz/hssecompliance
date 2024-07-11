<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= isset($regulation) ? 'Edit' : 'Add' ?> Regulation</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Regulation Form</h3>
                </div>
                <form action="<?= isset($regulation) ? base_url('regulation/update/'.$regulation->_id) : base_url('regulation/create') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis_peraturan">Jenis Peraturan</label>
                            <select class="form-control" id="jenis_peraturan" name="jenis_peraturan" required>
                                <option value="Undang-undang" <?= isset($regulation) && $regulation->jenis_peraturan == 'Undang-undang' ? 'selected' : '' ?>>Undang-undang</option>
                                <option value="Peraturan Pemerintah" <?= isset($regulation) && $regulation->jenis_peraturan == 'Peraturan Pemerintah' ? 'selected' : '' ?>>Peraturan Pemerintah</option>
                                <option value="Peraturan Presiden & Menteri" <?= isset($regulation) && $regulation->jenis_peraturan == 'Peraturan Presiden & Menteri' ? 'selected' : '' ?>>Peraturan Presiden & Menteri</option>
                                <option value="Keputusan Presiden & Menteri" <?= isset($regulation) && $regulation->jenis_peraturan == 'Keputusan Presiden & Menteri' ? 'selected' : '' ?>>Keputusan Presiden & Menteri</option>
                                <option value="Persyaratan Lainnya" <?= isset($regulation) && $regulation->jenis_peraturan == 'Persyaratan Lainnya' ? 'selected' : '' ?>>Persyaratan Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tentang">Tentang</label>
                            <input type="text" class="form-control" id="tentang" name="tentang" maxlength="255" required value="<?= isset($regulation) ? $regulation->tentang : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="isi_peraturan">Isi Peraturan (Pasal-Pasal Terkait)</label>
                            <textarea class="form-control" id="isi_peraturan" name="isi_peraturan" maxlength="400" required><?= isset($regulation) ? $regulation->isi_peraturan : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fungsi_terkait">Fungsi Terkait</label>
                            <input type="text" class="form-control" id="fungsi_terkait" name="fungsi_terkait" value="<?= isset($regulation) ? $regulation->fungsi_terkait : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="kritikal_point">Kritikal Point</label>
                            <textarea class="form-control" id="kritikal_point" name="kritikal_point" maxlength="400" required><?= isset($regulation) ? $regulation->kritikal_point : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kepatuhan">Kepatuhan</label>
                            <select class="form-control" id="kepatuhan" name="kepatuhan" required>
                                <option value="Ya" <?= isset($regulation) && $regulation->kepatuhan == 'Ya' ? 'selected' : '' ?>>Ya</option>
                                <option value="Tidak" <?= isset($regulation) && $regulation->kepatuhan == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="instansi_yang_mengeluarkan">Instansi yang Mengeluarkan</label>
                            <input type="text" class="form-control" id="instansi_yang_mengeluarkan" name="instansi_yang_mengeluarkan" maxlength="255" required value="<?= isset($regulation) ? $regulation->instansi_yang_mengeluarkan : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="analisa_resiko_uraian">Analisa Resiko Peraturan (Uraian)</label>
                            <textarea class="form-control" id="analisa_resiko_uraian" name="analisa_resiko_uraian" maxlength="600" required><?= isset($regulation) ? $regulation->analisa_resiko_uraian : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="analisa_resiko_kategori">Analisa Resiko Peraturan (Kategori)</label>
                            <select class="form-control" id="analisa_resiko_kategori" name="analisa_resiko_kategori" required>
                                <option value="A" <?= isset($regulation) && $regulation->analisa_resiko_kategori == 'A' ? 'selected' : '' ?>>A</option>
                                <option value="B" <?= isset($regulation) && $regulation->analisa_resiko_kategori == 'B' ? 'selected' : '' ?>>B</option>
                                <option value="C" <?= isset($regulation) && $regulation->analisa_resiko_kategori == 'C' ? 'selected' : '' ?>>C</option>
                                <option value="D" <?= isset($regulation) && $regulation->analisa_resiko_kategori == 'D' ? 'selected' : '' ?>>D</option>
                                <option value="E" <?= isset($regulation) && $regulation->analisa_resiko_kategori == 'E' ? 'selected' : '' ?>>E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="analisa_resiko_skor">Analisa Resiko Peraturan (Skor)</label>
                            <select class="form-control" id="analisa_resiko_skor" name="analisa_resiko_skor" required>
                                <option value="0" <?= isset($regulation) && $regulation->analisa_resiko_skor == '0' ? 'selected' : '' ?>>0</option>
                                <option value="1" <?= isset($regulation) && $regulation->analisa_resiko_skor == '1' ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= isset($regulation) && $regulation->analisa_resiko_skor == '2' ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= isset($regulation) && $regulation->analisa_resiko_skor == '3' ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= isset($regulation) && $regulation->analisa_resiko_skor == '4' ? 'selected' : '' ?>>4</option>
                                <option value="5" <?= isset($regulation) && $regulation->analisa_resiko_skor == '5' ? 'selected' : '' ?>>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="analisa_resiko_status">Analisa Resiko Peraturan (Status)</label>
                            <select class="form-control" id="analisa_resiko_status" name="analisa_resiko_status" required>
                                <option value="R" <?= isset($regulation) && $regulation->analisa_resiko_status == 'R' ? 'selected' : '' ?>>R</option>
                                <option value="S" <?= isset($regulation) && $regulation->analisa_resiko_status == 'S' ? 'selected' : '' ?>>S</option>
                                <option value="T" <?= isset($regulation) && $regulation->analisa_resiko_status == 'T' ? 'selected' : '' ?>>T</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dampak_finansial">Dampak Finansial</label>
                            <textarea class="form-control" id="dampak_finansial" name="dampak_finansial" maxlength="400" required><?= isset($regulation) ? $regulation->dampak_finansial : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dampak_pidana">Dampak Pidana</label>
                            <textarea class="form-control" id="dampak_pidana" name="dampak_pidana" maxlength="400" required><?= isset($regulation) ? $regulation->dampak_pidana : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" maxlength="400" required><?= isset($regulation) ? $regulation->keterangan : '' ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Tagify CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.0.3/tagify.css" />
<!-- Tagify JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.0.3/tagify.min.js"></script>
<script>
    // Initialize Tagify
    var input = document.querySelector('input[name=fungsi_terkait]');
    new Tagify(input, {
        whitelist: ["EP", "WOWS", "PO", "RAM", "LR", "HSSE", "SCM", "Finance", "HC", "ICT"]
    });
</script>

<?= $this->include('layouts/adminlte_footer') ?>
