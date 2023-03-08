<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Kelas</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas</h6>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->
                            <div>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>  
                                </div>
                                <?php endif; ?>

                                <div class="d-flex flex-row mb-3">
                                    <div class="p-2">
                                        <a href="<?= base_url('admin/tambah_kelas'); ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah Kelas &nbsp;</span>
                                        </a>
                                    </div>
                                </div>
                                <!-- <div class="d-flex flex-row mb-3">
                                    <div class="p-2">
                                        <a href="<?= base_url('admin/tambah_angkatan_siswa'); ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah Angkatan Siswa</span>
                                        </a>
                                    </div>
                                </div> -->

                            </div>
                            <thead>
                                <tr>
                                    <th width="2%">Kelas</th>
                                    <th>Wali Kelas</th>
                                    <th>NIP</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($guru as $user) : ?>
                                    <tr>
                                        <td align="center"><?= $user->nama_kelas ?></td>
                                        <td><?= $user->fullname ?></td>
                                        <td><?= $user->nip ?></td>
                                        <td align="center">
                                            <a href="/admin/edit_kelas/<?= $user->id_kelas_guru ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a>&nbsp;

                                            <a href="/admin/delete_kelas/<?= $user->id_kelas_guru ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Kelas Ini?')">
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