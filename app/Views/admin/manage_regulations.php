<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Regulations</h1>
                </div>
                <div class="col-sm-6">
                    <a href="/regulations/add" class="btn btn-primary float-sm-right">Add Regulation</a>
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
                        <div class="card-header">
                            <h3 class="card-title">List of Regulations</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="regulationsTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Peraturan</th>
                                        <th>Nama Peraturan</th>
                                        <th>Fungsi Terkait</th>
                                        <th>Kepatuhan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($regulations as $index => $regulation): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= ucfirst($regulation['jenis_peraturan']) ?></td>
                                            <td><?= $regulation['nama_peraturan'] ?></td>
                                            <td><?= $regulation['fungsi_terkait'] ?></td>
                                            <td><?= ucfirst($regulation['kepatuhan']) ?></td>
                                            <td>
                                                <a href="/regulations/detail/<?= (string) $regulation['_id'] ?>" class="btn btn-info">Detail</a>
                                                <a href="/regulations/edit/<?= (string) $regulation['_id'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="/regulations/delete/<?= (string) $regulation['_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this regulation?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->include('layouts/adminlte_footer') ?>
