<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Produk</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?php echo session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('admin/produk/proses_edit/' . ($produkData->id_produk ?? '')) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $produkData->id_produk ?? '' ?>" hidden>

                                <!-- Nama Produk (In) -->
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk (In) <br><span class="custom-color custom-label">nama produk hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="nama_produk_in" name="nama_produk_in" value="<?= $produkData->nama_produk_in ?? ''; ?>">
                                </div>

                                <!-- Nama Produk (En) -->
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk (En) <br><span class="custom-color custom-label">nama produk hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="nama_produk_en" name="nama_produk_en" value="<?= $produkData->nama_produk_en ?? ''; ?>">
                                </div>

                                <!-- Deskripsi Produk (In) -->
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Produk (In)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_produk_in" name="deskripsi_produk_in"><?= $produkData->deskripsi_produk_in ?? ''; ?></textarea>
                                </div>

                                <!-- Deskripsi Produk (En) -->
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Produk (En)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_produk_en" name="deskripsi_produk_en"><?= $produkData->deskripsi_produk_en ?? ''; ?></textarea>
                                </div>

                                <!-- Meta Title -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= $produkData->meta_title ?? ''; ?>">
                                </div>

                                <!-- Meta Description -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"><?= $produkData->meta_description ?? ''; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Title Inggris</label>
                                    <input type="text" class="form-control" id="meta_title_inggris" name="meta_title_inggris" value="<?= $produkData->meta_title_inggris ?? ''; ?>" placeholder="Masukkan Meta Title dalam Bahasa Inggris">
                                </div>
                                <!-- Tambahkan Meta Description -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Description Inggris</label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description_inggris" placeholder="Masukkan Meta Description"><?= $produkData->meta_description_inggris ?? ''; ?></textarea>
                                </div>

                                <!-- Foto Produk -->
                                <div class="mb-3">
                                    <label class="form-label">Foto Produk</label>
                                    <input type="file" class="form-control <?= isset($validation) && $validation->hasError('foto_produk') ? 'is-invalid' : '' ?>" id="foto_produk" name="foto_produk">
                                    <img width="150px" class="img-thumbnail" src="<?= base_url() . "asset-user/images/" . ($produkData->foto_produk ?? ''); ?>">
                                    <?php if (isset($validation)) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto_produk') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <p>*Ukuran foto maksimal 572x572 pixels</p>
                                <p>*Foto harus berekstensi jpg/png/jpeg</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col">
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>