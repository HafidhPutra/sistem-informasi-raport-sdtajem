<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Mata Pelajaran</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran</h6>
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
                                <div class="col-8">
                                    <a href="<?= base_url('admin/tambah_mapel'); ?>" class="btn btn-success btn-icon-split" class="col align-self-end">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Mata Pelajaran</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 border-primary small" placeholder="Cari Mata Pelajaran..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th width="10%">Kode</th>
                                    <th width="2%">Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th align="center" width="8%">Semester</th>
                                    <th>Pengampu</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($mapel as $user) : ?>
                                    <tr>
                                        <td align="center" scope="row"><?= $i++  ?></td>
                                        <td><?= $user['kode_mapel'] ?></td>
                                        <td align="center"><?= $user['kelas'] ?></td>
                                        <td><?= $user['nama_mapel'] ?></td>
                                        <td align="center"><?= $user['semester'] ?></td>
                                        <td><?= $user['pengampu'] ?></td>
                                        <td align="center">
                                            <a href="/admin/edit_mapel/<?= $user['id_mapel'] ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a>&nbsp;

                                            <a href="/admin/delete_mapel/<?= $user['id_mapel'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Akun Ini?')">
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