<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- cover start -->
<div class="container-fluid bg-offer my-5 py-5 wow zoomIn" data-wow-delay="0.1s" style="background-image: url('<?= base_url('asset-user/images/yellow-flower-2023-11-27-05-26-52-utc.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row gx-5 justify-content-center">
            <div class="text-center-container">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h6 class="text-white text-shadow mb-3">
                        <?php echo lang('Blog.titleActivities');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?>
                    </h6>
                <?php endforeach; ?>
                <p class="text-white text-shadow mb-4">
                    <a class="text-white" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerActivities');  ?></span>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- cover end -->

<?php foreach ($profil as $descper) : ?>
    <div class="container py-3">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                <h1 class="text-primary">
                    <b>
                        <?php if ($lang == 'en') : ?>
                            <?= $tbaktivitas->nama_aktivitas_en; ?>
                        <?php else : ?>
                            <?= $tbaktivitas->nama_aktivitas_in; ?>
                        <?php endif; ?>
                    </b>
                </h1>
                <p>
                    <?php if ($lang == 'en') : ?>
                        <?= $tbaktivitas->deskripsi_aktivitas_en; ?>
                    <?php else : ?>
                        <?= $tbaktivitas->deskripsi_aktivitas_in; ?>
                    <?php endif; ?>
                </p>
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100 lazyload" data-src="<?= base_url('asset-user/images/' . $tbaktivitas->foto_aktivitas) ?>" alt="Image placeholder">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection('content'); ?>