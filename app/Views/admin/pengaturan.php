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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php foreach ($users as $user) : ?>
                        <form action="/admin/userupdate/<?= $user->id ?>" method="post">
                        <?php endforeach; ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php endif; ?>
                                <!-- <div class="row">
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
                                </div> -->
                                <thead>
                                    <tr>
                                        <th width="2%">No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td class="align-middle text-center" scope="row"><?= $i++  ?></td>
                                            <td class="align-middle"><?= $user->fullname ?></td>
                                            <td class="align-middle"><?= $user->username ?></td>
                                            <td class="align-middle"><?= $user->name ?></td>
                                            <td class="align-middle">
                                                <select name="group_id" class="form-control">
                                                    <option value="<?= $user->group_id ?>"><?= $user->name ?></option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Guru</option>
                                                    <option value="3">Siswa</option>
                                                    <option value="4">Tidak Memiliki Hak Akses Apapun</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            
                        </div>
                        
                        </form>
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