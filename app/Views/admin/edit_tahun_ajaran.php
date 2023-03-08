<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Form Ubah Data Angkatan</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Angkatan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->
                            <form action="/admin/tahunajaranupdate/<?= $tahunajaran['id_tahun_ajaran'] ?>" method="post">
                                <?= csrf_field(); ?>

                                <input type="hidden" name="slug" value="<?= $tahunajaran['slug'] ?>">

                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" autofocus value="<?= $tahunajaran['tahun_ajaran'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Semester</label>
                                    <input type="text" name="semester" id="semester" class="form-control" autofocus value="<?= $tahunajaran['semester'] ?>">
                                </div>

                                <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>
                            </form>
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