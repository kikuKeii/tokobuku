<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="text-dark mb-4 mt-4">Edit</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Form EditBuku</p>
        </div>
        <div class="card-body">
            <form class="user" action="/buku/update/<?= $buku['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
                    <input type="hidden" name="sampulLama" value="<?= $buku['sampul']; ?>">
                    <input class="form-control form-control-user <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" type="text" id="judul" placeholder="Judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $buku['judul']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" type="text" id="tahun" placeholder="Tahun" name="tahun" value="<?= (old('tahun')) ? old('tahun') : $buku['tahun']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tahun'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" type="text" id="penulis" placeholder="Penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $buku['penulis']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('penulis'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" type="text" id="penerbit" placeholder="Penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('penerbit'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('bahasa')) ? 'is-invalid' : ''; ?>" type="text" id="bahasa" placeholder="Bahasa" name="bahasa" value="<?= (old('bahasa')) ? old('bahasa') : $buku['bahasa']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('bahasa'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user" type="number" id="jmlhHal" placeholder="Jumlah Haalaman" name="jmlhHal" value="<?= (old('jmlhHal')) ? old('jmlhHal') : $buku['jmlhHal']; ?>">

                </div>
                <div class="form-group">
                    <input class="form-control form-control-user" type="text" id="sinopsis" placeholder="sinopsis" name="sinopsis" value="<?= (old('sinopsis')) ? old('sinopsis') : $buku['sinopsis']; ?>">

                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" type="text" id="harga" placeholder="Harga" name="harga" value="<?= (old('harga')) ? old('harga') : $buku['harga']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('harga'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-user <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" type="text" id="jumlah" placeholder="Jumlah" name="jumlah" value="<?= (old('jumlah')) ? old('jumlah') : $buku['jumlah']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('jumlah'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" id="sampul" class="m-5 <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" name="sampul">
                    <label for="sampul"><?= $buku['sampul']; ?></label>
                    <!-- <input class="form-control form-control-user" type="filet" id="sampul" placeholder="Sampul" name="sampul"> -->
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                </div>

                <button class="btn btn-primary btn-block text-white btn-user" type="submit" value="1">Edit Buku</button>
                <hr>

                <hr>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>