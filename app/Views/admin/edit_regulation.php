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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Regulation</li>
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
                    <form action="<?= base_url('admin/update_regulation') ?>" method="post">
                        <input type="hidden" name="id" value="<?= esc($regulation['idregulasi']) ?>">

                        <!-- Display Error Messages -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <!-- Jenis Peraturan -->
                        <div class="form-group">
                            <label for="jenis_peraturan">Jenis Peraturan</label>
                            <select class="form-control" id="jenis_peraturan" name="jenis_peraturan" required>
                                <option value="Undang-Undang" <?= ($regulation['jenis_peraturan'] == 'Undang-Undang') ? 'selected' : '' ?>>Undang-Undang</option>
                                <option value="Peraturan Pemerintah" <?= ($regulation['jenis_peraturan'] == 'Peraturan Pemerintah') ? 'selected' : '' ?>>Peraturan Pemerintah</option>
                                <option value="Peraturan Presiden & Menteri" <?= ($regulation['jenis_peraturan'] == 'Peraturan Presiden & Menteri') ? 'selected' : '' ?>>Peraturan Presiden & Menteri</option>
                                <option value="Keputusan Presiden Menteri" <?= ($regulation['jenis_peraturan'] == 'Keputusan Presiden Menteri') ? 'selected' : '' ?>>Keputusan Presiden Menteri</option>
                                <option value="Persyaratan Lainnya" <?= ($regulation['jenis_peraturan'] == 'Persyaratan Lainnya') ? 'selected' : '' ?>>Persyaratan Lainnya</option>
                            </select>
                        </div>

                        <!-- Nama Peraturan -->
                        <div class="form-group">
                            <label for="nama_peraturan">Nama Peraturan</label>
                            <input type="text" class="form-control" id="nama_peraturan" name="nama_peraturan" value="<?= esc($regulation['nama_peraturan']) ?>" maxlength="264" required>
                        </div>

                        <!-- Fungsi Terkait (Checkboxes) -->
                        <div class="form-group">
                            <label for="fungsi_terkait">Fungsi Terkait</label><br>
                            <?php
                            $fungsi_terkait = explode(',', $regulation['fungsi_terkait']);
                            ?>
                            <?php foreach (['EP', 'WOWS', 'PO', 'RAM', 'LR', 'HSSE', 'SCM', 'Finance', 'HC', 'ICT', 'Semua Fungsi'] as $fungsi): ?>
                                <input type="checkbox" name="fungsi_terkait[]" value="<?= $fungsi ?>" <?= in_array($fungsi, $fungsi_terkait) ? 'checked' : '' ?>> <?= $fungsi ?><br>
                            <?php endforeach; ?>
                        </div>

                        <!-- Kepatuhan -->
                        <div class="form-group">
                            <label for="kepatuhan">Kepatuhan</label>
                            <select class="form-control" id="kepatuhan" name="kepatuhan" required>
                                <option value="Ya" <?= ($regulation['kepatuhan'] == 'Ya') ? 'selected' : '' ?>>Ya</option>
                                <option value="Tidak" <?= ($regulation['kepatuhan'] == 'Tidak') ? 'selected' : '' ?>>Tidak</option>
                            </select>
                        </div>

                        <!-- Isi Peraturan -->
                        <div class="form-group">
                            <label for="isi_peraturan">Isi Peraturan</label>
                            <textarea class="form-control" id="isi_peraturan" name="isi_peraturan" maxlength="1000" required><?= esc($regulation['isi_peraturan']) ?></textarea>
                        </div>

                        <!-- Poin Kritis -->
                        <div class="form-group">
                            <label for="poin_kritis">Poin Kritis</label>
                            <textarea class="form-control" id="poin_kritis" name="poin_kritis"><?= esc($regulation['poin_kritis']) ?></textarea>
                        </div>

                        <!-- Instansi Penerbit -->
                        <div class="form-group">
                            <label for="instansi_penerbit">Instansi Penerbit</label>
                            <input type="text" class="form-control" id="instansi_penerbit" name="instansi_penerbit" value="<?= esc($regulation['instansi_penerbit']) ?>" maxlength="200" required>
                        </div>

                        <!-- Analisis Risiko Uraian -->
                        <div class="form-group">
                            <label for="analisis_risiko_uraian">Analisis Risiko Uraian</label>
                            <textarea class="form-control" id="analisis_risiko_uraian" name="analisis_risiko_uraian" maxlength="600"><?= esc($regulation['analisis_risiko_uraian']) ?></textarea>
                        </div>

                        <!-- Analisis Risiko Kategori -->
                        <div class="form-group">
                            <label for="analisis_risiko_kategori">Analisis Risiko Kategori</label>
                            <select class="form-control" id="analisis_risiko_kategori" name="analisis_risiko_kategori">
                                <option value="A" <?= ($regulation['analisis_risiko_kategori'] == 'A') ? 'selected' : '' ?>>A</option>
                                <option value="B" <?= ($regulation['analisis_risiko_kategori'] == 'B') ? 'selected' : '' ?>>B</option>
                                <option value="C" <?= ($regulation['analisis_risiko_kategori'] == 'C') ? 'selected' : '' ?>>C</option>
                                <option value="D" <?= ($regulation['analisis_risiko_kategori'] == 'D') ? 'selected' : '' ?>>D</option>
                                <option value="E" <?= ($regulation['analisis_risiko_kategori'] == 'E') ? 'selected' : '' ?>>E</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Regulation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('layout/adminlte/adminlte_footer') ?>
