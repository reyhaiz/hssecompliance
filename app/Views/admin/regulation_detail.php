<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Regulation Detail (Admin)</h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail of Regulation (Admin)</h3>
                    <div class="card-tools">
                        <a href="<?= base_url('regulations') ?>" class="btn btn-primary">Back to Regulations</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Jenis Peraturan</th>
                            <td><?= esc($regulation['jenis_peraturan']) ?></td>
                        </tr>
                        <tr>
                            <th>Nama Peraturan</th>
                            <td><?= esc($regulation['nama_peraturan']) ?></td>
                        </tr>
                        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                        <tr>
                            <th>Fungsi Terkait</th>
                            <td><?= esc($regulation['fungsi_terkait']) ?></td>
                        </tr>
                        <tr>
                            <th>Kepatuhan</th>
                            <td><?= esc($regulation['kepatuhan']) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('layouts/adminlte_footer') ?>
