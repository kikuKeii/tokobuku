<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<?php
$id_user = [
    'name' => 'id_user',
    'id' => 'id_user',
    'value' => user()->id,
    'type' => 'hidden'
];
$id_buku = [
    'name' => 'id_buku',
    'id' => 'id_buku',
    'value' => $buku['id'],
    'type' => 'hidden'
];
$jumlah = [
    'name' => 'jumlah',
    'id' => 'jumlah',
    'value' => 1,
    'min' => 1,
    'class' => 'form-control',
    'type' => 'number',
    'max' => $buku['jumlah']
];
$total = [
    'name' => 'total',
    'id' => 'total',
    'value' => null,
    'class' => 'form-control',
    'readonly' => true
];
$ongkir = [
    'name' => 'ongkir',
    'id' => 'ongkir',
    'value' => null,
    'class' => 'form-control',
    'readonly' => true
];
$alamat = [
    'name' => 'alamat',
    'id' => 'alamat',
    'class' => 'form-control',
    'value' => null,

];
$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Beli',
    'class' => 'btn btn-success'
];

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="text-dark mb-4 mt-4">Beli</h3>
    <p><?= user()->id; ?> and <?= $buku['id']; ?></p>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold"><?= $buku['judul']; ?></p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <img src="/img/buku/<?php if ($buku['sampul'] == "") {
                                                echo "buku_default.jpg";
                                            } ?><?= $buku['sampul']; ?>" alt="" width="250px">
                        <h1><?= $buku['judul']; ?></h1>
                        <h4>Harga : <?= $buku['harga']; ?></h4>
                        <h4>Stok : <?= $buku['jumlah']; ?></h4>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <h4>Pengiriman</h4>
                        <div class="form-group">
                            <label for="provinsi">Pilih Provinsi</label>
                            <select class="form-control" id="provinsi">
                                <option value="">Select Service</option>
                                <?php foreach ($provinsi as $p) : ?>
                                    <option value="<?= $p->province_id; ?>"><?= $p->province; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Pilih Kabupaten</label>
                            <select class="form-control" id="kabupaten">
                                <option value="">Select Service</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service">Pilih Layanan</label>
                            <select class="form-control" id="service">
                                <option value="">Select Layanan</option>
                            </select>
                        </div>
                        <strong>Estimasi : <span id="estimasi"></span></strong>
                        <hr>
                        <?= form_open('Transaksi/beli') ?>
                        <input type="hidden" name="id_user" id="id_user" value="<?= user()->id; ?>">
                        <input type="hidden" name="id_buku" id="id_buku" value="<?= $buku['id']; ?>">
                        <div class="form-group">
                            <?= form_label('Jumblah Pembelian', 'jumlah pembelian') ?>
                            <?= form_input($jumlah) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Ongkir', 'ongkir') ?>
                            <?= form_input($ongkir) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Total', 'total') ?>
                            <?= form_input($total) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Alamat', 'alamat') ?>
                            <?= form_input($alamat) ?>
                        </div>
                        <div class="text-right">
                            <?= form_submit($submit) ?></div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $('document').ready(function() {
        $("#provinsi").on('change', function() {
            $("#kabupaten").empty();
            var id_province = $(this).val();
            $.ajax({
                url: "<?= base_url('transaksi/getcity') ?>",
                type: 'GET',
                data: {
                    'id_province': id_province,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"];
                    for (var i = 0; i < results.length; i++) {
                        $("#kabupaten").append($('<option>', {
                            value: results[i]["city_id"],
                            text: results[i]["city_name"]
                        }));
                    }
                }
            });
        });

        $("#kabupaten").on('change', function() {
            var id_city = $(this).val();
            $.ajax({
                url: "<?= base_url('transaksi/getcost') ?>",
                type: 'GET',
                data: {
                    'origin': 455,
                    'destination': id_city,
                    'weight': 1000,
                    'courier': 'jne'
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
            });
        })
    });
</script>
<?= $this->endSection(); ?>