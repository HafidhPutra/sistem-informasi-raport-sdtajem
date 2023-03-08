<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Guru</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                                <!-- Tambah Data -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="<?= base_url('admin/tambah_guru'); ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah Data Guru</span>
                                        </a>
                                    </div>
                                    <form action="" method="get">
                                    <div class="col-md-4 offset-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-1 border-primary small" placeholder="Cari Guru..." name="keyword">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-undo fa-sm" href="admin/guru"></i>
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
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a href="<?= base_url('admin/import_guru'); ?>" class="btn btn-info btn-icon-split" class="col align-self-end">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="text">Import Data Guru &nbsp;</span>
                                    </a>
                                </div>
                            </div><br>

                                <tr>
                                    <th width="2%">No</th>
                                    <th width="3%">Foto</th>
                                    <th>Nama Lengkap</th>
                                    <th>NUPTK</th>
                                    <th>TTL</th>
                                    <th width="15%">Jabatan</th>
                                    <th width="13%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($guru as $user) : ?>
                                    <tr>
                                        <td align="center" scope="row"><?= $i++  ?></td>
                                        <td><img class="rounded" src="<?= base_url('img/' . $user->user_img); ?>" alt="User Image"></td>
                                        <td><?= $user->fullname ?></td>
                                        <td align="center" ><?= $user->no_id ?></td>
                                        <td><?= $user->tempat_lahir ?>, <?= $user->tanggal_lahir ?></td>
                                        <td align="center" ><?= $user->jabatan ?></td>
                                        <td align="center">
                                            <a href="/admin/guru/<?= $user->user_id ?>" class="btn btn-primary btn-circle btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>&nbsp;

                                            <a href="/admin/edit_guru/<?= $user->user_id ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a>&nbsp;

                                            <a href="/admin/delete_guru/<?= $user->user_id ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Akun Ini?')">
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