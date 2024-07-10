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
                        <!-- Form Fields -->
                        <div class="form-group">
                            <label for="jenis_peraturan">Jenis Peraturan</label>
                            <select class="form-control" id="jenis_peraturan" name="jenis_peraturan" required>
                                <option value="Undang-undang" <?= isset($regulation) && $regulation->jenis_peraturan == 'Undang-undang' ? 'selected' : '' ?>>Undang-undang</option>
                                <!-- other options -->
                            </select>
                        </div>
                        <!-- other fields -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->include('layouts/adminlte_footer') ?>
