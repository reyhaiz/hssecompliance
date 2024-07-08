<?= $this->include('layouts/header') ?>

<h1>List of Regulations</h1>
<ul>
    <?php foreach ($regulations as $regulation): ?>
        <li><?= $regulation['title'] ?> - <?= $regulation['description'] ?></li>
    <?php endforeach; ?>
</ul>

<?= $this->include('layouts/footer') ?>
