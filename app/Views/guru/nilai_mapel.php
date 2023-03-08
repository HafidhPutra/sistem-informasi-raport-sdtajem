<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-gray-800">Daftar Nilai Siswa</h6>
                        <h4 class="m-0 font-weight-bold text-primary"><?= $detail['fullname'] ?></h4>
                </div>
                <div class="card-body">
                     
                    <div class="table-responsive">
                        <div class="col-9">
                            <a href="/admin/tambah_nilai2/<?= $detail['id'] ?>" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                 <span class="text">Tambah Nilai Siswa</span>
                             </a>
                         </div> <br>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <!-- Tambah Data -->
                            <thead>
                                <tr align="center">
                                    <th width="2%">No</th>
                                    <th width="20%">Tahun Ajaran</th>
                                    <th width="3%">Kelas</th>
                                    <th width="3%">Semester</th>
                                    <th width="25%">Tampil</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($nilai as $user) : ?>
                                    <tr>
                                        <td class="text-center align-middle" scope="row"><?= $i++  ?></td>
                                        <td class="align-middle"><?= $user->tahun_ajaran ?></td>
                                        <td class="text-center align-middle"><?= $user->nama_kelas ?></td>
                                        <td class="text-center align-middle"><?= $user->semester ?></td>
                                        <td class="text-center align-middle">
                                            <a href="/admin/detail_nilai/<?= $user->id_nilai ?>" class="btn btn-primary">
                                                <span class="icon text-white-50">
                                                </span>
                                                <span class="text">Kurikulum K13</span>
                                            </a>&nbsp;
                                            <a href="/admin/detail_nilai2/<?= $user->id_nilai ?>" class="btn btn-info">
                                                <span class="icon text-white-50">
                                                </span>
                                                <span class="text">Kurikulum Merdeka</span>
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">&nbsp;&nbsp;
                                        <a href="/admin/edit_nilai/<?= $user->id_nilai ?>" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>&nbsp;&nbsp;
                                        <a href="/admin/cetak_nilai/<?= $user->id_nilai ?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-print"></i>
                                        </a>&nbsp;&nbsp;
                                        <a href="/admin/cetak_nilai2/<?= $user->id_nilai ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-print"></i>
                                        </a>&nbsp;&nbsp;
                                        <a href="" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Nilai Ini?')">
                                                <i class="fas fa-trash"></i>
                                        </td>
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