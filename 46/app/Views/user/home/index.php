<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<?= $this->include('user/home/slider'); ?>

<!-- Title Start -->
<div class="container-fluid p-0">
    <?php foreach ($profil as $title) : ?>
        <div class="p-3" style="max-width: 900px; margin: 0 auto; text-align: center;">
            <h3 class="text-primary display-3 mt-3 mb-md-3" style="font-size: 50px; font-weight: bold; color: #ED6436;">
                <?= $title->title_website; ?>
            </h3>
        </div>
    <?php endforeach; ?>
</div>
<!-- Title End -->

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="block-2">
        <?php foreach ($profil as $descper) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="img-container">
                            <img src="<?= base_url('asset-user/images/' . $descper->foto_utama); ?>"
                                alt="<?= $descper->nama_perusahaan; ?>"
                                class="img-fluid img-overlap lazyload zoomable-image"
                                style="border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-lg-5 ml-auto">
                        <h3 class="text-primary section-subtitle text-green opacity-50">
                            <?php echo lang('Blog.titleAboutUs') ?>
                        </h3>
                        <h2 class="section-title mb-4"><?= $descper->nama_perusahaan; ?></h2>
                        <p class="opacity-50">
                            <?php if ($lang == 'en') {
                                echo character_limiter($descper->deskripsi_perusahaan_en, 700);
                            } else {
                                echo character_limiter($descper->deskripsi_perusahaan_in, 700);
                            } ?>
                        </p>
                        <div class="button">
                            <a href="<?= base_url('about') ?>" class="btn btn-lg btn-primary mt-3 px-4">
                                <?php echo lang('Blog.btnReadmore'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- About End -->

<!-- Product Start -->

<div class="container mt-2 pt-2 pb-2 text-center">
    <div class="product-title">
        <h2 class="text-secondary mb-3"><?php echo lang('Blog.btnOurproducts'); ?></h2>
    </div>
    <div class="row justify-content-center">
        <?php $count = 0; ?>
        <?php foreach ($tbproduk as $produk) : ?>
            <?php if ($count < 3) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <?php
                    // Ambil bahasa dari session, atau set ke 'id' secara default jika tidak ada
                    $lang = session()->get('lang') ?? 'id';
                    $route = ($lang === 'en') ? 'product' : 'produk'; // Sesuaikan route berdasarkan bahasa
                    ?>
                    <a href="<?= base_url("$lang/{$route}/detail/" . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                        <div class="team card position-relative overflow-hidden border-0 mb-4">
                            <img src="<?= base_url('asset-user/images/' . $produk->foto_produk); ?>"
                                alt="<?php echo $lang == 'en' ? $produk->nama_produk_en : $produk->nama_produk_in; ?>">
                            <div class="card-body text-center p-0">
                                <div class="team-text d-flex flex-column justify-content-center bg-light">
                                    <h5 class="text-primary">
                                        <?php if ($lang == 'en') {
                                            echo character_limiter($produk->nama_produk_en, 700);
                                        } else {
                                            echo character_limiter($produk->nama_produk_in, 700);
                                        } ?>
                                    </h5>
                                </div>
                                <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                                    <a class="btn btn-outline-primary text-center mr-2 px-2"
                                        href="<?= base_url("$lang/{$route}/detail/" . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                                        <?php if ($lang == 'en') {
                                            echo character_limiter($produk->nama_produk_en, 700);
                                        } else {
                                            echo character_limiter($produk->nama_produk_in, 700);
                                        } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php $count++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="button">
        <a href="<?= base_url('product') ?>" class="btn btn-lg btn-primary mt-3 px-4"><?php echo lang('Blog.btnOurproducts'); ?></a>
    </div>
</div>
<!-- Product End -->

<!-- Product End -->

<!-- Activity Start -->
<div class="container pt-5">
    <div class="product-title">
        <h2 class="text-secondary mb-3"><?php echo lang('Blog.brnOurActivities'); ?></h2>
    </div>
    <div class="row pb-3 justify-content-center">
        <?php $count = 0; ?>
        <?php foreach ($tbaktivitas as $aktivitas) : ?>
            <?php if ($count < 3) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team card position-relative overflow-hidden border-0 mb-4">
                        <a href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>" class="img-link">
                            <img class="card-img-top lazyload" src="asset-user/images/<?= $aktivitas->foto_aktivitas ?>" alt="Gambar Aktivitas">
                        </a>
                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-light">
                                <h5>
                                    <a class="card-title" href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>">
                                        <?php if ($lang == 'en') {
                                            echo character_limiter($aktivitas->nama_aktivitas_en, 700);
                                        } else {
                                            echo character_limiter($aktivitas->nama_aktivitas_in, 700);
                                        } ?>
                                    </a>
                                </h5>
                            </div>
                            <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                                <a class="btn btn-outline-primary text-center mr-2 px-2" href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>">
                                    <?php echo lang('Blog.btnReadmore'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endif; ?>
        <?php endforeach ?>
    </div>
    <div class="d-flex justify-content-center">
        <div class="button">
            <a href="<?= base_url('activities') ?>" class="btn btn-lg btn-primary mt-3 px-4"><?php echo lang('Blog.brnOurActivities'); ?></a>
        </div>
    </div>
</div>
<!-- Activity End -->
<br>

<?= $this->endSection('content') ?>