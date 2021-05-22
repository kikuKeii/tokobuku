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
    <h1 class="h3 mb-4 text-gray-800">Buku</h1>
    <div class="container">

        <div class="color-box">

            <div class="book-detail">
                <?php if (in_groups('admin')) : ?>
                    <a href="/buku/edit/<?= $buku['slug']; ?>" type="button" class="btn btn-warning">Edit</a>
                    <form action="/buku/<?= $buku['id']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ?')">Delete</button>
                    </form>
                <?php endif; ?>
                <h1 class="book-title"><?= $buku['judul']; ?></h1>
                <h4 class="book-author"><?= $buku['penulis']; ?></h4>

                <p class="description"><?= $buku['sinopsis']; ?></p>

                <p class="description"></p>
                <table class="description">
                    <tr>
                        <td>Penerbit</td>
                        <td>:</td>
                        <td><?= $buku['penerbit']; ?></td>
                    </tr>
                    <tr>
                        <td>tahun</td>
                        <td>:</td>
                        <td><?= $buku['tahun']; ?></td>
                    </tr>
                    <tr>
                        <td>Bahasa</td>
                        <td>:</td>
                        <td><?= $buku['bahasa']; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Halman</td>
                        <td>:</td>
                        <td><?= $buku['jmlhHal']; ?></td>
                    </tr>
                    <tr>
                        <td>Dibuat pada</td>
                        <td>:</td>
                        <td><?= $buku['created_at']; ?></td>
                    </tr>
                    <tr>
                        <td>Diupdate pada</td>
                        <td>:</td>
                        <td><?= $buku['updated_at']; ?></td>
                    </tr>

                </table>

                <a href="/transaksi/beli/<?= $buku['id']; ?>" class="btn-buy-now"> Buy Now </a>

            </div>

            <img class="book-picture" src="/img/buku/<?php if ($buku['sampul'] == "") {
                                                            echo "buku_default.jpg";
                                                        } ?><?= $buku['sampul']; ?>" alt="book-picture" />
        </div>

    </div>
</div>

<?= $this->endSection(); ?>