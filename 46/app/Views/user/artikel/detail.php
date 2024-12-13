<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<link rel="stylesheet" href="<?= base_url('asset-user/css/styles.css'); ?>">

<!-- cover start -->
<div class="container-fluid bg-offer my-5 py-5 wow zoomIn" data-wow-delay="0.1s" style="background-image: url('<?= base_url('asset-user/images/yellow-flower-2023-11-27-05-26-52-utc.jpg'); ?>');">
    <div class="container py-5">
        <div class="row gx-5 justify-content-center">
            <div class="text-center-container">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h6 class="text-white text-shadow mb-3">
                        <?php echo lang('Blog.titleOurarticle');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?>
                    </h6>
                <?php endforeach; ?>
                <p class="text-white text-shadow mb-4">
                    <a class="text-white" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerArticle');  ?></span>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- cover end -->

<!-- News With Sidebar Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="<?= base_url('asset-user/images/' . $artikel->foto_artikel); ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($artikel->created_at)); ?></a>
                        </div>
                        <h1 class="display-5 mb-2 article-title">
                            <?= $lang == 'en' ? $artikel->judul_inggris : $artikel->judul_artikel; ?>
                        </h1>
                        <p class="fs-5">
                            <?= $lang == 'en' ? $artikel->description_inggris : $artikel->deskripsi_artikel; ?>
                        </p>
                    </div>
                </div>
                <!-- News Detail End -->
            </div>

            <div class="col-lg-4">
                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Baca Juga</h5>
                    </div>
                    <br>
                    <div class="bg-white border border-top-0 p-3">
                        <?php foreach ($artikel_lain as $artikel_item) : ?>
                            <div class="d-flex align-items-center bg-white mb-3 article-item">
                                <img class="img-fluid article-image" src="<?= base_url('asset-user/images/' . $artikel_item->foto_artikel); ?>" alt="">
                                <div class="w-100 h-100 d-flex flex-column justify-content-center article-content">
                                    <div class="mb-2">
                                        <a class="text-body" href="<?= base_url('/artikel/detail/' . $artikel_item->id_artikel) ?>"><small><?= date('d F Y', strtotime($artikel_item->created_at)); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 display-7" href="<?= base_url('/artikel/detail/' . $artikel_item->id_artikel) ?>">
                                        <?= $lang == 'en' ? $artikel_item->judul_inggris : $artikel_item->judul_artikel; ?> <!-- Tampilkan judul lengkap -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Popular News End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<?= $this->endSection('content'); ?>