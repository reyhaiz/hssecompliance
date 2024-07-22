<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include(APPPATH . 'Views/layout/adminlte/header.php'); ?>
    <?php include(APPPATH . 'Views/layout/adminlte/sidebar_superadmin.php'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Admin</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of Admins</h3>
                                <div class="card-tools">
                                    <a href="<?= base_url('superadmin/add_admin') ?>" class="btn btn-primary">Add Admin</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Foto Profil</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($admins as $admin): ?>
                                        <tr>
                                            <td><?= $admin['id'] ?></td>
                                            <td><?= $admin['nama'] ?></td>
                                            <td><?= $admin['email'] ?></td>
                                            <td><img src="<?= base_url('public/images/profile_pics/'.$admin['foto_profil']) ?>" alt="Profile Picture" width="50"></td>
                                            <td>
                                                <a href="<?= base_url('superadmin/edit_admin/'.$admin['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('superadmin/delete_admin/'.$admin['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin?')">Delete</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include(APPPATH . 'Views/layout/adminlte/footer.php'); ?>
</div>
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
