<?= $this->include('layout/adminlte/header') ?>

<link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">

<div class="main-container">
    <h1 class="mb-3">Regulations</h1>

    <!-- Tombol untuk membuka pop-up grafik -->
    <p><a href="#" id="openChartPopup" class="btn btn-primary">Grafik</a></p>

    <!-- Filter Fungsi Terkait dan Kepatuhan -->
    <div class="filter-container mb-4">
        <form id="filterForm" class="form-inline">
            <div class="form-group mb-2">
                <label for="fungsi_terkait" class="mr-2">Fungsi Terkait:</label><br>
                <input type="checkbox" id="checkAll" class="fungsi" value="Semua Fungsi"> Semua Fungsi
                <input type="checkbox" class="fungsi" value="HSSE"> HSSE
                <input type="checkbox" class="fungsi" value="HR"> HR
                <input type="checkbox" class="fungsi" value="EP"> EP
                <input type="checkbox" class="fungsi" value="Operasi"> Operasi
                <input type="checkbox" class="fungsi" value="Finance"> Finance
                <input type="checkbox" class="fungsi" value="WOWS"> WOWS
                <input type="checkbox" class="fungsi" value="PO"> PO
                <input type="checkbox" class="fungsi" value="RAM"> RAM
                <input type="checkbox" class="fungsi" value="LR"> LR
                <input type="checkbox" class="fungsi" value="SCM"> SCM
                <input type="checkbox" class="fungsi" value="HC"> HC
                <input type="checkbox" class="fungsi" value="ICT"> ICT
            </div>

            <div class="form-group mb-2 ml-4">
                <label for="kepatuhan" class="mr-2">Kepatuhan:</label><br>
                <input type="radio" name="kepatuhan" value="Ya"> Ya
                <input type="radio" name="kepatuhan" value="Tidak"> Tidak
            </div>

            <div class="mt-3">
                <button type="button" class="btn btn-primary mb-2" onclick="filterRegulations()">Terapkan Filter</button>
                <button type="button" class="btn btn-secondary mb-2" onclick="clearFilters()">Clear</button>
            </div>
        </form>
    </div>

    <div class="table-container">
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
                    <tr onclick="window.location='<?= base_url('regulation/detail/' . $regulation['idregulasi']) ?>'">
                        <td><?= $index + 1 ?></td>
                        <td><?= esc($regulation['jenis_peraturan']) ?></td>
                        <td><a href="<?= base_url('regulation/detail/' . $regulation['idregulasi']) ?>"><?= esc($regulation['nama_peraturan']) ?></a></td>
                        <td><?= esc($regulation['fungsi_terkait']) ?></td>
                        <td><?= esc($regulation['kepatuhan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Menampilkan jumlah total peraturan di bawah tabel -->
    <p>Total Regulations: <span id="total-regulations"><?= count($regulations) ?></span></p>

</div>

<!-- Pop-up untuk menampilkan grafik -->
<div id="chartPopup" class="chart-popup" style="display: none;">
    <div class="chart-popup-content">
        <span id="closeChartPopup" class="close">&times;</span>
        <h2>Grafik Kepatuhan</h2>
        <canvas id="complianceChart"></canvas>
    </div>
</div>

<!-- Style untuk pop-up -->
<style>
    .chart-popup {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .chart-popup-content {
        position: relative;
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        width: 60%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    .close {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<!-- Script untuk menampilkan chart dan pop-up -->
<script>
    var originalComplianceData = <?= json_encode($complianceData) ?>;
    var labels = Object.keys(originalComplianceData);
    var yesData = labels.map(function (label) {
        return originalComplianceData[label].yes;
    });
    var noData = labels.map(function (label) {
        return originalComplianceData[label].no;
    });

    // Chart.js
    var ctx = document.getElementById('complianceChart').getContext('2d');
    var complianceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Yes',
                data: yesData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'No',
                data: noData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Fungsi untuk menampilkan/menghilangkan pop-up
    var chartPopup = document.getElementById("chartPopup");
    var openChartPopup = document.getElementById("openChartPopup");
    var closeChartPopup = document.getElementById("closeChartPopup");

    // Ketika tombol "Grafik" diklik
    openChartPopup.onclick = function(event) {
        event.preventDefault();
        chartPopup.style.display = "block";
    }

    // Ketika tombol "X" diklik
    closeChartPopup.onclick = function() {
        chartPopup.style.display = "none";
    }

    // Menutup pop-up ketika pengguna mengklik di luar kotak
    window.onclick = function(event) {
        if (event.target == chartPopup) {
            chartPopup.style.display = "none";
        }
    }

    // Fungsi untuk filter regulasi
    function filterRegulations() {
        var selectedFungsi = Array.from(document.querySelectorAll('.fungsi:checked')).map(function (checkbox) {
            return checkbox.value;
        });

        var kepatuhan = document.querySelector('input[name="kepatuhan"]:checked') ? document.querySelector('input[name="kepatuhan"]:checked').value : '';

        var rows = document.querySelectorAll('#regulation-table tr');
        var totalVisibleRows = 0;
        rows.forEach(function (row) {
            var fungsiCell = row.cells[3].innerText.trim();
            var kepatuhanCell = row.cells[4].innerText.trim();

            var isFungsiMatch = selectedFungsi.includes("Semua Fungsi") || selectedFungsi.some(fungsi => fungsiCell.includes(fungsi));
            var isKepatuhanMatch = (kepatuhan === "" || kepatuhanCell === kepatuhan);

            if (isFungsiMatch && isKepatuhanMatch) {
                row.style.display = "";
                totalVisibleRows++;
            } else {
                row.style.display = "none";
            }
        });

        // Update total regulations count
        document.getElementById('total-regulations').innerText = totalVisibleRows;

        // Update grafik berdasarkan fungsi terkait yang dipilih
        var filteredComplianceData = {};
        if (selectedFungsi.includes("Semua Fungsi")) {
            filteredComplianceData = originalComplianceData;
        } else {
            selectedFungsi.forEach(function (fungsi) {
                if (originalComplianceData[fungsi]) {
                    filteredComplianceData[fungsi] = originalComplianceData[fungsi];
                }
            });
        }

        updateChart(filteredComplianceData);
    }

    // Fungsi untuk memperbarui chart
    function updateChart(filteredData) {
        var updatedLabels = Object.keys(filteredData);
        var updatedYesData = updatedLabels.map(function (label) {
            return filteredData[label].yes;
        });
        var updatedNoData = updatedLabels.map(function (label) {
            return filteredData[label].no;
        });

        complianceChart.data.labels = updatedLabels;
        complianceChart.data.datasets[0].data = updatedYesData;
        complianceChart.data.datasets[1].data = updatedNoData;
        complianceChart.update();
    }

    // Fungsi untuk clear filter
    function clearFilters() {
        document.querySelectorAll('.fungsi').forEach(function (checkbox) {
            checkbox.checked = false;
        });
        var checkedRadio = document.querySelector('input[name="kepatuhan"]:checked');
        if (checkedRadio) {
            checkedRadio.checked = false;
        }
        document.getElementById('checkAll').checked = true;

        filterRegulations();
    }

    // Fungsi untuk memilih Semua Fungsi
    document.getElementById('checkAll').onclick = function () {
        var checkboxes = document.querySelectorAll('.fungsi');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = document.getElementById('checkAll').checked;
        });
    };
</script>

<?= $this->include('layout/adminlte/footer') ?>
