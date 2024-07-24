<?= $this->include('layout/adminlte/header') ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">

<div class="main-container">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="mr-3">List of Regulations</h1>
        <form action="" method="get" class="search-form d-flex align-items-center">
            <input type="text" name="search" class="form-control search-input" placeholder="Search regulations...">
            <button type="submit" class="btn search-button">Search</button>
        </form>
    </div>
    <div class="d-flex align-items-center mb-3">
        <span class="mr-2">View Mode:</span>
        <span id="list-view-button" class="material-symbols-outlined btn-view-mode active">
            view_list
        </span>
        <span id="table-view-button" class="material-symbols-outlined btn-view-mode">
            data_table
        </span>
    </div>
    <div id="list-container" class="list-container">
        <ul id="regulation-list">
            <?php foreach ($regulations as $regulation): ?>
                <li><a href="<?= base_url('regulation/detail/' . $regulation['id']) ?>"><?= esc($regulation['nama_peraturan']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="table-container" class="table-container" style="display:none;">
        <table class="table table-bordered home-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Peraturan</th>
                    <th>Nama Peraturan</th>
                    <th>Fungsi Terkait</th>
                    <th>Kepatuhan</th>
                </tr>
            </thead>
            <tbody id="regulation-table">
                <?php foreach ($regulations as $index => $regulation): ?>
                    <tr onclick="window.location='<?= base_url('regulation/detail/' . $regulation['id']) ?>'">
                        <td><?= $index + 1 ?></td>
                        <td><?= esc($regulation['jenis_peraturan']) ?></td>
                        <td><a href="<?= base_url('regulation/detail/' . $regulation['id']) ?>"><?= esc($regulation['nama_peraturan']) ?></a></td>
                        <td>
                            <?php
                            if (is_array($regulation['fungsi_terkait'])) {
                                echo esc(implode(', ', $regulation['fungsi_terkait']));
                            } else {
                                echo esc($regulation['fungsi_terkait']);
                            }
                            ?>
                        </td>
                        <td><?= esc($regulation['kepatuhan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('list-view-button').addEventListener('click', function() {
        document.getElementById('list-container').style.display = 'block';
        document.getElementById('table-container').style.display = 'none';
        document.getElementById('list-view-button').classList.add('btn-primary', 'active');
        document.getElementById('table-view-button').classList.remove('btn-primary', 'active');
        document.getElementById('table-view-button').classList.add('btn-secondary');
    });

    document.getElementById('table-view-button').addEventListener('click', function() {
        document.getElementById('list-container').style.display = 'none';
        document.getElementById('table-container').style.display = 'block';
        document.getElementById('table-view-button').classList.add('btn-primary', 'active');
        document.getElementById('list-view-button').classList.remove('btn-primary', 'active');
        document.getElementById('list-view-button').classList.add('btn-secondary');
    });
</script>

<?= $this->include('layout/adminlte/footer') ?>