<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Artikel</h1>
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

                    <form action="<?= base_url('admin/artikel/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Judul Artikel</label>
                                    <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" value="<?= old('judul_artikel') ?>">
                                </div>
                                <!-- Tambahkan Judul Artikel Inggris -->
                                <div class="mb-3">
                                    <label class="form-label">Judul Artikel (Bahasa Inggris)</label>
                                    <input type="text" class="form-control" id="judul_inggris" name="judul_inggris" value="<?= old('judul_artikel_inggris') ?>" placeholder="Masukkan Judul Artikel dalam Bahasa Inggris">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Artikel</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_artikel" name="deskripsi_artikel"><?= old('deskripsi_artikel') ?></textarea>
                                </div>
                                <!-- Tambahkan Deskripsi Artikel Inggris -->
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Artikel (Bahasa Inggris)</label>
                                    <textarea class="form-control tiny" id="description_inggris" name="description_inggris" placeholder="Masukkan Deskripsi Artikel dalam Bahasa Inggris"><?= old('deskripsi_artikel_inggris') ?></textarea>
                                </div>
                                <!-- Meta Title dan Meta Description tetap sama -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= old('meta_title') ?>" placeholder="Masukkan Meta Title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title Inggris</label>
                                    <input type="text" class="form-control" id="meta_title_inggris" name="meta_title_inggris" value="<?= old('meta_title_inggris') ?>" placeholder="Masukkan Meta Title dalam Bahasa Inggris">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Masukkan Meta Description"><?= old('meta_description') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description Inggris</label>
                                    <textarea class="form-control" id="meta_description_inggris" name="meta_description_inggris" placeholder="Masukkan Meta Description dalam Bahasa Inggris"><?= old('meta_description_inggris') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Artikel</label>
                                    <input class="form-control <?= ($validation && $validation->hasError('foto_artikel')) ? 'is-invalid' : '' ?>" type="file" id="foto_artikel" name="foto_artikel">
                                    <?php if ($validation && $validation->hasError('foto_artikel')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto_artikel') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <p>*Ukuran gambar maksimal 572x572 pixels</p>
                                <p>*Format gambar harus berekstensi jpg/png/jpeg</p>
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

<?= $this->endSection('content'); ?>