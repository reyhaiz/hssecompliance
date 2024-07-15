<?= $this->include('layouts/header') ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<div class="container">
    <h1>List of Regulations</h1>
    <div class="mb-3">
        <input type="text" id="search" class="form-control" placeholder="Search regulations..." onkeyup="filterRegulations()">
    </div>
    <div class="d-flex align-items-center mb-3">
        <span class="mr-2">View Mode:</span>
        <span id="list-view-button" class="material-symbols-outlined btn btn-primary">
            view_list
        </span>
        <span id="table-view-button" class="material-symbols-outlined btn btn-secondary">
            data_table
        </span>
    </div>
    <div id="list-container">
        <ul id="regulation-list">
            <?php foreach ($regulations as $regulation): ?>
                <li><a href="<?= base_url('regulation/detail/' . $regulation->_id) ?>"><?= esc($regulation->nama_peraturan) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="table-container" style="display:none;">
        <table class="table table-bordered">
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
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= esc($regulation->jenis_peraturan) ?></td>
                        <td><a href="<?= base_url('regulation/detail/' . $regulation->_id) ?>"><?= esc($regulation->nama_peraturan) ?></a></td>
                        <td><?= esc(implode(', ', $regulation->fungsi_terkait)) ?></td>
                        <td><?= esc($regulation->kepatuhan) ?></td>
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
    });

    document.getElementById('table-view-button').addEventListener('click', function() {
        document.getElementById('list-container').style.display = 'none';
        document.getElementById('table-container').style.display = 'block';
    });

    function filterRegulations() {
        var input, filter, ul, li, a, i, txtValue, table, tr, td, j;
        input = document.getElementById('search');
        filter = input.value.toUpperCase();
        ul = document.getElementById('regulation-list');
        li = ul.getElementsByTagName('li');
        table = document.getElementById('regulation-table');
        tr = table.getElementsByTagName('tr');

        // Filter list view
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName('a')[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }

        // Filter table view
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName('td');
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
</script>

<?= $this->include('layouts/footer') ?>
