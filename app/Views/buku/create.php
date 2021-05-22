<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="text-dark mb-4 mt-4">Create</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Form Input Buku</p>
        </div>
        <div class="card-body">
            <form class="user" action="/buku/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" type="text" id="judul" placeholder="Judul" name="judul" autofocus value="<?= old('judul'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" type="text" id="tahun" placeholder="Tahun" name="tahun" value="<?= old('tahun'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tahun'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" type="text" id="penulis" placeholder="Penulis" name="penulis" value="<?= old('penulis'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('penulis'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" type="text" id="penerbit" placeholder="Penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('penerbit'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('bahasa')) ? 'is-invalid' : ''; ?>" type="text" id="bahasa" placeholder="Bahasa" name="bahasa" value="<?= old('bahasa'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('bahasa'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user" type="number" id="jmlhHal" placeholder="Jumlah Haalaman" name="jmlhHal" value="<?= old('jmlhHal'); ?>">

                </div>
                <div class="form-group">
                    <input class="form-control form-control-user" type="text" id="sinopsis" placeholder="sinopsis" name="sinopsis" value="<?= old('sinopsis'); ?>">

                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" type="text" id="harga" placeholder="Harga" name="harga" value="<?= old('harga'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('harga'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" type="text" id="jumlah" placeholder="Jumlah" name="jumlah" value="<?= old('jumlah'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('jumlah'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" id="sampul" class="m-5 <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" name="sampul">
                    <!-- <input class="form-control form-control-user" type="filet" id="sampul" placeholder="Sampul" name="sampul"> -->
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                </div>
                <button class="btn btn-primary btn-block text-white btn-user" type="submit" value="1">Submit Buku</button>
                <hr>

                <hr>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>