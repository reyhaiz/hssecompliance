<?= $this->include('layouts/header') ?>

<h1>List of Regulations</h1>
<form action="" method="get">
    <input type="text" name="search" placeholder="Search regulations...">
    <button type="submit">Search</button>
</form>
<ul>
    <?php foreach ($regulations as $regulation): ?>
        <li>
            <a href="<?= base_url('regulation/detail/' . (string) $regulation->_id) ?>">
                <?= esc($regulation->nama_peraturan) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?= $this->include('layouts/footer') ?>
