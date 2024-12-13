<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- cover start -->
<div class="container-fluid bg-offer my-5 py-5 wow zoomIn" data-wow-delay="0.1s" style="background-image: url('<?= base_url('asset-user/images/yellow-flower-2023-11-27-05-26-52-utc.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row gx-5 justify-content-center">
            <div class="text-center-container">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h6 class="text-white text-shadow mb-3">
                        <?php echo lang('Blog.titleOurproducts');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?>
                    </h6>
                <?php endforeach; ?>
                <p class="text-white text-shadow mb-4">
                    <a class="text-white" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerProducts');  ?></span>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- cover end -->

<!-- Product Start -->
<!-- Product Start -->
<div class="container mt-2 pt-2 pb-2 text-center">
    <div class="product-title">
        <h2 class="text-secondary mb-3"><?php echo lang('Blog.btnOurproducts'); ?></h2>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($tbproduk as $produk) : ?>
            <div class="col-lg-3 col-md-6">
                <div class="team card position-relative overflow-hidden border-0 mb-4">
                    <img class="img-fluid w-100" style="object-fit: cover;" src="<?= base_url('asset-user') ?>/images/<?= $produk->foto_produk; ?>" loading="lazy">
                    <div class="card-body text-center p-0">
                        <div class="team-text d-flex flex-column justify-content-center bg-light">
                            <!-- Add the 'text-primary' class to make the product name blue -->
                            <h5 class="text-primary"> <!-- Applied text-primary class -->
                                <?php if ($lang == 'en') {
                                    echo $produk->nama_produk_en;
                                } else {
                                    echo $produk->nama_produk_in;
                                } ?>
                            </h5>
                        </div>
                        <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                            <a class="btn btn-outline-primary text-center mr-2 px-2"
                                href="<?= base_url(($lang === 'en' ? 'en/product/' . esc($produk->slug_en) : 'id/produk/' . esc($produk->slug_id))) ?>" class="img-link">
                                <?php if ($lang == 'en') {
                                    echo $produk->nama_produk_en;
                                } else {
                                    echo $produk->nama_produk_in;
                                } ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Product End -->

<!-- Product End -->

<?= $this->endSection('content'); ?>