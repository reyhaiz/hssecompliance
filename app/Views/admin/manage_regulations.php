<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Regulations</h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Regulations</h3>
                    <div class="card-tools">
                        <a href="<?= base_url('regulation/add') ?>" class="btn btn-primary">Add Regulation</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (empty($regulations)): ?>
                        <p>No regulations found.</p>
                    <?php else: ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Peraturan</th>
                                    <th>Nama Peraturan</th>
                                    <th>Fungsi Terkait</th>
                                    <th>Kepatuhan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($regulations as $index => $regulation): ?>
                                    <tr onclick="window.location.href='<?= base_url('regulation/detail/'.$regulation->_id) ?>'">
                                        <td><?= $index + 1 ?></td>
                                        <td><?= esc($regulation->jenis_peraturan) ?? '' ?></td>
                                        <td><?= esc($regulation->nama_peraturan) ?? '' ?></td>
                                        <td>
                                            <?php
                                            if (is_array($regulation->fungsi_terkait)) {
                                                echo implode(', ', $regulation->fungsi_terkait);
                                            } else {
                                                echo esc($regulation->fungsi_terkait) ?? '';
                                            }
                                            ?>
                                        </td>
                                        <td><?= esc($regulation->kepatuhan) ?? '' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('layouts/adminlte_footer') ?>
