<?= $this->include('layouts/adminlte_header') ?>
<?= $this->include('layouts/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Regulation Detail</h1>
                </div>
                <div class="col-sm-6">
                    <a href="/regulations/edit/<?= (string) $regulation['_id'] ?>" class="btn btn-warning float-sm-right">Edit</a>
                    <a href="/regulations/delete/<?= (string) $regulation['_id'] ?>" class="btn btn-danger float-sm-right mr-2" onclick="return confirm('Are you sure you want to delete this regulation?')">Delete</a>
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
                        <div class="card-body">
                            <h3>Nama Peraturan: <?= $regulation['nama_peraturan'] ?></h3>
                            <p>Jenis Peraturan: <?= $regulation['jenis_peraturan'] ?></p>
                            <p>Fungsi Terkait: <?= implode(', ', $regulation['fungsi_terkait']) ?></p>
                            <p>Kepatuhan: <?= $regulation['kepatuhan'] ?></p>
                            <!-- Add more details as necessary -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->include('layouts/adminlte_footer') ?>
