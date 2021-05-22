<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buku</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Buku</h6>
        </div>
        <div class="card-body">
            <?php if (in_groups('admin')) : ?>
                <a href="/buku/create" class="btn btn-outline btn-primary btn-lg btn-block">Tambahkan Buku</a>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-bordered <?php if (in_groups('admin')) : ?>mt-5<?php endif ?>" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sampul</th>
                            <th>Judul</th>
                            <th>Prnulis</th>
                            <th>Tahun</th>
                            <th>Lainya</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Sampul</th>
                            <th>Judul</th>
                            <th>Penulid</th>
                            <th>Tahun</th>
                            <th>Lainya</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <?php $i = 1; ?>
                            <?php foreach ($buku as $b) : ?>
                                <td><?= $i++; ?></td>
                                <td><img src="/img/buku/<?php if ($b['sampul'] == "") {
                                                            echo "buku_default.jpg";
                                                        } ?><?= $b['sampul']; ?>" alt="" width="150px"></td>
                                <td><?= $b['judul']; ?></td>
                                <td><?= $b['penulis']; ?></td>
                                <td><?= $b['tahun']; ?></td>
                                <td><a href="<?= base_url('buku/' . $b['slug']); ?>" type="button" class="btn btn-info">Detail
                                    </a>

                                </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('buku', 'pagerS'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>