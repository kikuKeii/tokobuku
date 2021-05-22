<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Books List</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Telp</th>
                            <th>Umur</th>
                            <th>Daftar</th>
                            <th>Lainya</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Telp</th>
                            <th>Umur</th>
                            <th>Daftar</th>
                            <th>Lainya</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <!-- <?php foreach ($pasien as $p) : ?>
                                <td><?= $p['nm_pasien']; ?></td>
                                <td><?= $p['jk']; ?></td>
                                <td><?= $p['telp']; ?></td>
                                <td><?= $p['umur']; ?></td>
                                <td><?= $p['created_at']; ?></td>
                                <td><a href="#" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>&nbsp;<a href="#" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a></td>
                        </tr>
                    <?php endforeach; ?> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>