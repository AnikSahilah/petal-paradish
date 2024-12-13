<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/asset-user/css/styles.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-6wX1LhZXnVogun+j6uG3e3U2lVHT2wH2P/8m6+6k50hbLOF35xr3N4fG+nC5tOylzA3SK0OEvY/zxPzVVuzfUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Petal Paradise</title>
</head>
<body>
<?php foreach ($profil as $header) : ?>
    <div class="header-container">
        <div class="header-content">
            <div class="logo">
                <a href="<?= base_url('/') ?>" class="navbar-brand">
                    <img src="<?= base_url('asset-user/images/'); ?><?= $header->logo_perusahaan ?>" alt="<?= $header->nama_perusahaan ?>" class="img-fluid" style="max-width: 110px;">
                </a>
            </div>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="contact-text">
                        <h6>Indonesia</h6>
                        <p><?= $header->alamat; ?></p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div class="contact-text">
                        <h6>Telepon kami</h6>
                        <p><?= $header->no_hp; ?></p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div class="contact-text">
                        <h6>Email kami</h6>
                        <p><?= $header->email; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('user/layout/nav'); ?>
<?php endforeach; ?>
</body>
</html>
