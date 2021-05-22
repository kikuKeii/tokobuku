<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User List</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
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