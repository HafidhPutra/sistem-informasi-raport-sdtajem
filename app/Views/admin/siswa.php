<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<link href="vendor/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Siswa</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                            <!-- <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <label>Search:
                                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            <!-- Tambah Data -->

                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?= base_url('admin/tambah_siswa'); ?>" class="btn btn-success btn-icon-split" class="col align-self-end">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data Siswa</span>
                                    </a>
                                </div>
                                <form action="" method="get">
                                    <div class="col-md-4 offset-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-1 border-primary small" placeholder="Cari Siswa..." name="keyword">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" type="submit" name="submit">
                                                    <i class="fas fa-undo fa-sm" href="admin/siswa"></i>
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
                                    <a href="<?= base_url('admin/import_siswa'); ?>" class="btn btn-info btn-icon-split" class="col align-self-end">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="text">Import Data Siswa &nbsp;</span>
                                    </a>
                                </div>
                            </div>
                    </div><br>
                    <!-- <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-success btn-icon-split" class="col align-self-end">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Import Data Siswa</span>
                        </a>
                    </div> -->

                    <thead>
                        <tr class="text-center">
                            <th class="align-middle" width="2%">No</th>
                            <th class="align-middle" width="5%">Foto</th>
                            <th class="align-middle">NISN</th>
                            <th class="align-middle">Nama</th>
                            <th class="align-middle">TTL</th>
                            <th class="align-middle">Jenis Kelamin</th>
                            <th class="align-middle">Alamat</th>
                            <th class="align-middle" width="13%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $user) : ?>
                            <tr>
                                <td class="align-middle" align="center" scope="row"><?= $i++  ?></td>
                                <td class="align-middle"><img class="rounded" src="<?= base_url('img/' . $user->user_img); ?>" alt="User Image"></td>
                                <td class="align-middle" align="center"><?= $user->no_id ?></td>
                                <td class="align-middle"><?= $user->fullname ?></td>
                                <td class="align-middle"><?= $user->tempat_lahir ?>, <?= $user->tanggal_lahir ?></td>
                                <td class="align-middle" align="center"><?= $user->jenis_kelamin ?></td>
                                <td class="align-middle"><?= $user->alamat ?></td>
                                <td class="align-middle" align="center">
                                    <a href="/admin/siswa/<?= $user->userid ?>" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>&nbsp;

                                    <a href="/admin/edit_siswa/<?= $user->userid ?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>&nbsp;

                                    <a href="/admin/delete_siswa/<?= $user->userid ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Akun Ini?')">
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