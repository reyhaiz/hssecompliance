<?= $this->include('layout/adminlte/adminlte_header_superadmin') ?>
<?= $this->include('layout/adminlte/sidebar_superadmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Admin</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Admin</li>
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
                    <a href="<?= base_url('superadmin/add_admin') ?>" class="btn btn-primary mb-3">Add Admin</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admins as $admin): ?>
                            <tr>
                                <td><?= $admin['idadmin'] ?></td>
                                <td><?= $admin['nama_admin'] ?></td>
                                <td><?= $admin['email_admin'] ?></td>
                                <td><?= $admin['role'] ?></td>
                                <td>
                                    <a href="<?= base_url('superadmin/edit_admin/'.$admin['idadmin']) ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('superadmin/delete_admin/'.$admin['idadmin']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
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

<?= $this->include('layout/adminlte/adminlte_footer_superadmin') ?>
