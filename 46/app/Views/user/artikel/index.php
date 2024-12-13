<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- cover start -->
<div class="container-fluid bg-offer my-5 py-5 wow zoomIn" data-wow-delay="0.1s" style="background-image: url('<?= base_url('asset-user/images/yellow-flower-2023-11-27-05-26-52-utc.jpg'); ?>'); background-size: cover; background-position: center;">
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
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Artikel Terbaru</h5>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <?php foreach ($artikelTerbaru as $row) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="position-relative d-flex flex-column h-100 mb-3">
                        <a href="<?= base_url(($lang === 'en' ? 'en/article/' . esc($row->slug_en) : 'id/artikel/' . esc($row->slug_id))) ?>" class="img-link">
                            <img class="img-fluid w-100" style="object-fit: cover;" src="<?= base_url('asset-user') ?>/images/<?= $row->foto_artikel; ?>" loading="lazy">
                        </a>
                        <div class="bg-white border border-top-0 p-4 flex-grow-1">
                            <div class="mb-2">
                                <a class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($row->created_at)); ?></a>
                            </div>
                            <a class="h4 display-5" href="<?= base_url(($lang === 'en' ? 'en/article/' . esc($row->slug_en) : 'id/artikel/' . esc($row->slug_id))) ?>" class="img-link">
                                <?= $lang === 'en' ? strip_tags($row->judul_inggris) : strip_tags($row->judul_artikel); ?>
                            </a>
                            <p><?= $lang === 'en' ? substr(strip_tags($row->description_inggris), 0, 30) : substr(strip_tags($row->deskripsi_artikel), 0, 30); ?>...</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>