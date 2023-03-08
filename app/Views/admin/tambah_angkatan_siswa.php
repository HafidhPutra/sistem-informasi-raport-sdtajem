<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Pengaturan Pengguna</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <div class="row">
                                <form action="" method="get">
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-1 border-primary small" placeholder="Cari Pengguna..." name="keyword">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-undo fa-sm" href="admin/pengaturan"></i>
                                                </button>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" name="submit">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div><br>
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($nilai as $user) : ?>
                                    <tr>
                                        <td align="center" scope="row"><?= $i++  ?></td>
                                        <td><?= $user->fullname ?></td>
                                        <td><?= $user->username ?></td>
                                        <td align="center">
                                            <a a href="/admin/edit_angkatan_siswa/<?= $user->user_id ?>" class="btn btn-primary btn-circle btn-sm">
                                                <i class="fas fa-plus"></i>
                                            </a>&nbsp;
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><br>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<?= $this->endSection(); ?>