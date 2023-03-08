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
                        <h5 class="m-0 font-weight-bold text-gray-800">Kelas 5 Semester 2</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Tahun Angkatan</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">1</td>
                                    <td>Hafidh Putra Andhika</td>
                                    <td>L200180085</td>
                                    <td>2018</td>
                                    <td align="center">
                                        <a href="<?= base_url('admin/detail_nilai'); ?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>&nbsp;
                                        <a href="<?= base_url('admin/tambah_nilai'); ?>" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>&nbsp;

                                        <a href="#" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
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