<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Transaksi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (in_groups('user')) : ?>
                <h6 class="m-0 font-weight-bold text-primary">DataTables Riwayat Transaksi</h6>
            <?php endif ?>
            <?php if (in_groups('admin')) : ?>
                <h6 class="m-0 font-weight-bold text-primary">DataTables Transaksi Pembelian Buku</h6>
            <?php endif ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <?php if (in_groups('user')) : ?><th>Sampul</th> <?php endif ?>
                            <?php if (in_groups('admin')) : ?><th>Username</th> <?php endif ?>
                            <th>Judul</th>
                            <th>Jumlah Beli</th>
                            <th>Ongkir</th>
                            <th>Total</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Lainnya</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <?php if (in_groups('user')) : ?><th>Sampul</th> <?php endif ?>
                            <?php if (in_groups('admin')) : ?><th>Username</th> <?php endif ?>
                            <th>Judul</th>
                            <th>Jumlah Beli</th>
                            <th>Ongkir</th>
                            <th>Total</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>lainya</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($transaksi as $t) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?php if (in_groups('user')) : "<img src=" . "<?= base_url('img/buku/' . $t->sampul); ?>" . " width=" . "180px" . ">";
                                    endif ?><a href="<?= base_url('admin/' . $t->id_user); ?>"><?php if (in_groups('admin')) : echo $t->username;
                                                                                                endif ?></a></td>
                                <td><a href="<?= base_url('buku/' . $t->slug); ?>"><?= $t->judul; ?></a></td>
                                <td><?= $t->jumBel; ?></td>
                                <td><?= $t->ongkir; ?></td>
                                <td><?= $t->total; ?></td>
                                <td><?= $t->fullname; ?> <br><?= $t->alamat; ?> <br><?= $t->telp; ?></td>
                                <td><?php if ($t->sss == 0) {
                                        echo "Pesanan Sedang diproses";
                                    } elseif ($t->sss == 1) {
                                        echo "Pesanan Sedang dikirim";
                                    } else {
                                        echo "Pesanan Sampai ditempat";
                                    } ?></td>
                                <td><a href="<?= base_url('transaksi/view/' . $t->tid); ?>" class="btn btn-primary">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>