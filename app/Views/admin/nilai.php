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
                    <h3 class="m-0 font-weight-bold text-gray-800">Daftar Siswa</h6>
                       
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <div class="row">
                                    <div class="col-md-4">
                                        <a href="<?= base_url('admin/import_nilai'); ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <span class="text">Import Nilai Siswa</span>
                                        </a>
                                    </div>
                                    <form action="" method="get">
                                    <div class="col-md-4 offset-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-1 border-primary small" placeholder="Cari Siswa..." name="keyword">
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
                            </div><br>
                            <!-- Tambah Data -->
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Tahun Angkatan</th>
                                    <th width="17%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($nilai as $user) : ?>
                                <tr>
                                    <td align="center"><?= $i++  ?></td>
                                    <td><?= $user->fullname ?></td>
                                    <td><?= $user->no_id ?></td>
                                    <td><?= $user->tahun_angkatan ?></td>
                                    <td align="center">
                                        <!-- <a href="<?= base_url('admin/detail_nilai'); ?>" class="btn btn-primary btn-circle btn-sm ">
                                            <i class="fas fa-eye"></i>
                                        </a>&nbsp;&nbsp; -->
                                        <a href="/admin/nilai_mapel/<?= $user->id ?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </a>&nbsp;&nbsp;
                                        <!-- <a href="#" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-print"></i> -->
                                        </a>
                                    </td>
                                </tr><?php endforeach; ?>
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