<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- cover start -->
<div class="container-fluid bg-offer my-5 py-5 wow zoomIn" data-wow-delay="0.1s" style="background-image: url('<?= base_url('asset-user/images/yellow-flower-2023-11-27-05-26-52-utc.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row gx-5 justify-content-center">
            <div class="text-center-container">
                <h6 class="text-white text-shadow mb-3">
                    <?php echo lang('Blog.titleAboutUs'); ?>
                </h6>
                <p class="text-white text-shadow mb-4">
                    <a class="text-white" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerAbout');  ?></span>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- cover end -->

<!-- About Start -->
<?php foreach ($profil as $descper) : ?>
    <div class="container py-3">
        <div class="row py-5">
            <div class="col-lg-5 order-lg-2 pb-5 pb-lg-0 px-3 px-lg-5">
                <img class="img-fluid w-100 lazyload" data-src="<?= base_url('asset-user/images/' . $descper->foto_utama); ?>" <?php foreach ($profil as $perusahaan) :  ?>alt="<?= $perusahaan->nama_perusahaan; ?>" <?php endforeach; ?>>
            </div>
            <div class="col-lg-7 order-lg-1 px-3 px-lg-5">
                <h4 class="text-secondary mb-3"><?php echo lang('Blog.titleAboutUs')  ?></h4>
                <h2 class="text-primary"><span><?= $descper->nama_perusahaan; ?></span></h2>
                <h5 class="text-muted mb-3">
                    <?php if ($lang == 'en') {
                        echo character_limiter($descper->deskripsi_perusahaan_en, 700);
                    } else {
                        echo character_limiter($descper->deskripsi_perusahaan_in, 700);
                    } ?>
                </h5>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- About End -->

<?= $this->endSection('content'); ?>