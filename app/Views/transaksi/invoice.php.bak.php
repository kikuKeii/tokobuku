<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice <?= $t->tid; ?></title>
    <link rel="stylesheet" href="/css/sb-admin-2.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Invoice
                <strong><?= $t->updat; ?></strong>
                <span class="float-right"> <strong>Status:</strong> Pending</span>

            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">From:</h6>
                        <div>
                            <strong>Toko Buku</strong>
                        </div>
                        <div>Tangerang</div>
                        <div>Jl. Balaraja - Kronjo Kp. Bankung Kec. Kronjo </div>
                        <div> Kab. Tnagerang-Banten</div>
                        <div>Email: kikifoji093@gmail.com</div>
                        <div>Phone: +62 838-0730-3926</div>
                    </div>

                    <div class="col-sm-6">
                        <h6 class="mb-3">To:</h6>
                        <div>
                            <strong><?= $t->fullname; ?></strong>
                        </div>
                        <div><?= $t->alamat; ?></div>
                        <div><?= $t->alamat; ?></div>
                        <div>Email: <?= $t->email; ?></div>
                        <div>Phone: <?= $t->telp; ?></div>
                    </div>



                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Barang</th>
                                <th>Deskripsi</th>

                                <th class="right">Harga Barang</th>
                                <th class="center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center">1</td>
                                <td class="left strong"><?= $t->judul; ?></td>
                                <td class="left">Garansi 1 Minggu</td>

                                <td class="right"><?= "Rp. " . number_format($t->harga, 2, ',', '.'); ?></td>
                                <td class="center"><?= $t->jumBel; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Ongkir</strong>
                                    </td>
                                    <td class="right"><?= "Rp. " . number_format($t->ongkir, 2, ',', '.'); ?></td>
                                </tr>
                                <tr>

                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong><?= "Rp. " . number_format($t->total, 2, ',', '.'); ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

</html>