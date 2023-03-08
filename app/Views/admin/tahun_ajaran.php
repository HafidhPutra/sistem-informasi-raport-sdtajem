<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tahun Ajaran</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Tahun Ajaran</h6>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->
                            <div>

                                <div class="d-flex flex-row mb-3">
                                    <div class="p-2">
                                        <a href="<?= base_url('admin/tambah_tahun_ajaran'); ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah Tahun Ajaran</span>
                                        </a>
                                    </div>
                                    <!-- <div class="p-2">
                                        <div class="dropdown mb-4">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tahun
                                            </button>
                                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">2018</a>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Semester</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tahunajaran as $user) : ?>
                                    <tr>
                                        <td align="center" scope="row"><?= $i++  ?></td>
                                        <td><?= $user['tahun_ajaran'] ?></td>
                                        <td><?= $user['semester'] ?></td>
                                        <td align="center">
                                            <a href="/admin/edit_tahun_ajaran/<?= $user['id_tahun_ajaran'] ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a>&nbsp;
                                            <a href="/admin/delete_tahunajaran/<?= $user['id_tahun_ajaran'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Akun Ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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