<?= $this->include('layout/adminlte/adminlte_header') ?>
<?= $this->include('layout/adminlte/sidebar_admin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Regulations</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Regulations</li>
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
                    <a href="<?= base_url('admin/add_regulation') ?>" class="btn btn-primary mb-3">Add Regulation</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Peraturan</th>
                                <th>Nama Peraturan</th>
                                <th>Fungsi Terkait</th>
                                <th>Kepatuhan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($regulations as $index => $regulation): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= esc($regulation['jenis_peraturan']) ?></td>
                                <td><?= esc($regulation['nama_peraturan']) ?></td>
                                <td><?= esc($regulation['fungsi_terkait']) ?></td>
                                <td><?= esc($regulation['kepatuhan']) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/edit_regulation/' . $regulation['id']) ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('admin/delete_regulation/' . $regulation['id']) ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
