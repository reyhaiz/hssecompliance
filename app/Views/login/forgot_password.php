<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lupa Kata Sandi</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('images/logobungben.png') ?>" type="image/png">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('/') ?>"><b>HSSE</b>Regulation</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Masukkan email Anda untuk mereset kata sandi</p>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger text-white">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>
            <form action="<?= site_url('login/send_reset_link') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Kirim Permintaan Reset</button>
                    </div>
                </div>
            </form>
            <p class="mt-3 mb-1">
                <a href="<?= site_url('login') ?>">Kembali ke Login</a>
            </p>
        </div>
    </div>
</div>
<!-- JS -->
<script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
