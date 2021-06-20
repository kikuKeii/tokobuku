<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Pemesanan <?= $t->tid; ?></h6>
        </div>
        <div class="card-body">
            <div class="card">
                <?= $this->extend('templates/index'); ?>

                <?= $this->section('page-content'); ?>
                <style>
                    div.container {
                        margin: 0 auto;
                        /* width: 950px; */
                    }

                    .color-box {
                        position: relative;
                        height: 750px;
                        background: rgba(255, 255, 255, 1);
                        background: linear-gradient(110deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 54%, rgba(26, 168, 167, 1) 44%, rgba(26, 168, 167, 1) 60%, rgba(26, 168, 167, 1) 100%);

                    }

                    .color-box .book-detail {
                        width: 400px;
                        padding-top: 20px;

                    }

                    .color-box .book-detail .book-author {
                        text-align: center;
                    }

                    .color-box .book-detail p.description {
                        text-indent: 20px;
                        padding-left: 20px;
                    }

                    .color-box .book-detail .btn-buy-now {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        background: orange;
                        color: white;
                        height: 50px;
                        width: 50%;
                        margin: 0 auto;
                        text-decoration: none;
                    }

                    .container .color-box .book-picture {
                        position: absolute;
                        max-width: 400px;
                        top: 130px;
                        right: 80px;
                        box-shadow: 10px 10px 5px #888888;
                    }

                    .description-list {
                        margin-left: 10px;
                        padding: 0;
                    }

                    ul.description-list li {
                        padding: 2px 0;
                    }
                </style>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">View Pemesanan <?= $t->tid; ?></h1>
                    <?php if (in_groups('admin')) : ?>
                        <div class="row">
                            <div class="col-3">
                                <form action="<?= base_url('transaksi/update/' . $t->tid); ?>" method="post">
                                    <input type="hidden" name="id_user" id="id_user" value="<?= $t->id_user; ?>">
                                    <input type="hidden" name="id_buku" id="id_buku" value="<?= $t->id_buku; ?>">
                                    <input type="hidden" name="jumlah" value="<?= $t->jumBel; ?>">
                                    <input type="hidden" name="total" value="<?= $t->total; ?>">
                                    <input type="hidden" name="alamat" value="<?= $t->alamat; ?>">
                                    <input type="hidden" name="ongkir" value="<?= $t->ongkir; ?>">


                                    <select class="form-control" id="kabupaten" name="status">
                                        <option value="0" name="status">Proses</option>
                                        <option value="1" name="status">Dikirim</option>
                                        <option value="2" name="status">Sampai</option>
                                    </select>
                                    <input type="submit" value="Update" class="btn btn-success mt-2">
                                </form>
                            </div>

                        </div>



                    <?php endif; ?>
                    <div class="container">

                        <div class="color-box">

                            <div class="book-detail">

                                <h1 class="book-title"><?= $t->judul; ?></h1>
                                <h4 class="book-author"><?= $t->penulis; ?></h4>

                                <p class="description"><?= $t->sinopsis; ?></p>

                                <p class="description"></p>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Penerbit</td>
                                            <td>:</td>
                                            <td><?= $t->penerbit; ?></td>
                                        </tr>
                                        <tr>
                                            <td>tahun</td>
                                            <td>:</td>
                                            <td><?= $t->tahun; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bahasa</td>
                                            <td>:</td>
                                            <td><?= $t->bahasa; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Halman</td>
                                            <td>:</td>
                                            <td><?= $t->jmlhHal; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="description">--------------------------------</p><br>
                                <p class="description"><?= $t->fullname . " - " . $t->alamat . ". <br>" . $t->telp; ?></p>
                                <p class="description">Pemesanan pada <?= $t->updat; ?> oleh <b><?= $t->fullname; ?></b> dengan username "<b><?= $t->username; ?></b>" dan ID pemesanan : <?= $t->tid; ?> sedang diproses.</p>

                                <?php if (in_groups('user')) : ?>
                                    <a href="<?= base_url('transaksi/invoice/' . $t->tid); ?>" class="btn-buy-now"> Print Invoice</a>
                                <?php endif; ?>

                            </div>

                            <img class="book-picture" src="/img/buku/<?php if ($t->sampul == "") {
                                                                            echo "buku_default.jpg";
                                                                        } ?><?= $t->sampul; ?>" alt="book-picture" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>