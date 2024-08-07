<?= $this->include('layout/adminlte/header') ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">

<div class="main-container">
    <h1 class="mb-3">Regulations</h1>
    <div class="chart-container mb-3" style="width: 60%; margin: 0 auto;">
        <canvas id="complianceChart"></canvas>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-3">
        <form action="" method="get" class="search-form d-flex align-items-center">
            <input type="text" name="search" class="form-control search-input" placeholder="Search regulations...">
            <button type="submit" class="btn search-button">Search</button>
        </form>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <span class="mr-2">View Mode:</span>
            <span id="list-view-button" class="material-symbols-outlined btn-view-mode active">
                view_list
            </span>
            <span id="table-view-button" class="material-symbols-outlined btn-view-mode">
                data_table
            </span>
        </div>
        <div>
            <form action="" method="get" id="perPageForm">
                <select name="perPage" id="perPage" class="form-control">
                    <option value="25" <?= $perPage == 25 ? 'selected' : '' ?>>25</option>
                    <option value="75" <?= $perPage == 75 ? 'selected' : '' ?>>75</option>
                    <option value="150" <?= $perPage == 150 ? 'selected' : '' ?>>150</option>
                </select>
            </form>
        </div>
    </div>

    <div id="list-container" class="list-container">
        <ol id="regulation-list">
            <?php foreach ($regulations as $regulation): ?>
                <li><a href="<?= base_url('regulation/detail/' . $regulation['id']) ?>"><?= esc($regulation['nama_peraturan']) ?></a></li>
            <?php endforeach; ?>
        </ol>
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

    <div class="pagination-container">
        <?= $pager->links('regulations', 'default_full') ?>
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

    document.getElementById('perPage').addEventListener('change', function() {
        document.getElementById('perPageForm').submit();
    });

    const ctx = document.getElementById('complianceChart').getContext('2d');
    const complianceData = {
        labels: ['HSSE', 'HR', 'EP', 'Operasi', 'Finance', 'WOWS', 'PO', 'RAM', 'LR', 'SCM', 'HC', 'ICT', 'Semua Fungsi'],
        datasets: [
            {
                label: 'Kepatuhan Ya',
                data: [<?= $complianceData['HSSE']['yes'] ?>, <?= $complianceData['HR']['yes'] ?>, <?= $complianceData['EP']['yes'] ?>, <?= $complianceData['Operasi']['yes'] ?>, <?= $complianceData['Finance']['yes'] ?>, <?= $complianceData['WOWS']['yes'] ?>, <?= $complianceData['PO']['yes'] ?>, <?= $complianceData['RAM']['yes'] ?>, <?= $complianceData['LR']['yes'] ?>, <?= $complianceData['SCM']['yes'] ?>, <?= $complianceData['HC']['yes'] ?>, <?= $complianceData['ICT']['yes'] ?>, <?= $complianceData['Semua Fungsi']['yes'] ?>],
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Kepatuhan Tidak',
                data: [<?= $complianceData['HSSE']['no'] ?>, <?= $complianceData['HR']['no'] ?>, <?= $complianceData['EP']['no'] ?>, <?= $complianceData['Operasi']['no'] ?>, <?= $complianceData['Finance']['no'] ?>, <?= $complianceData['WOWS']['no'] ?>, <?= $complianceData['PO']['no'] ?>, <?= $complianceData['RAM']['no'] ?>, <?= $complianceData['LR']['no'] ?>, <?= $complianceData['SCM']['no'] ?>, <?= $complianceData['HC']['no'] ?>, <?= $complianceData['ICT']['no'] ?>, <?= $complianceData['Semua Fungsi']['no'] ?>],
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    };

    const complianceChart = new Chart(ctx, {
        type: 'bar',
        data: complianceData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?= $this->include('layout/adminlte/footer') ?>
