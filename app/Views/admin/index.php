<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User List</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
        </div>
        <div class="card-body">
            <div class="row">

                <!-- total user Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total user</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tuser; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- total buku Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Buku</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tbuku; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Transaksi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tT; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Lainya</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Usernama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Lainya</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $u) : ?>
                                <td><?= $i++; ?></td>
                                <td><?= $u->username; ?></td>
                                <td><?= $u->email; ?></td>
                                <td><?= $u->name; ?></td>
                                <td><a href="<?= base_url('admin/' . $u->userid); ?>" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>

                                </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
                <?= $pager->links('users', 'pagerS'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>