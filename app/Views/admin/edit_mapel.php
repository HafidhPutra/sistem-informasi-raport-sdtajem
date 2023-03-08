<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Form Ubah Mata Pelajaran</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mata Pelajaran</h6>
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
                            <form action="/admin/mapelupdate/<?= $mapel['id_mapel'] ?>" method="post">
                                <?= csrf_field(); ?>

                                <input type="hidden" name="slug" value="<?= $mapel['slug'] ?>">

                                <div class="form-group">
                                    <label>Nama Mata Pelajaran</label>
                                    <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" autofocus value="<?= $mapel['nama_mapel'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Kode Mata Pelajaran</label>
                                    <input type="text" name="kode_mapel" id="kode_mapel" class="form-control" autofocus value="<?= $mapel['kode_mapel'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option value="">-- Pilih Kelas --</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Semester</label>
                                    <select name="semester" id="semester" class="form-control">
                                        <option value="">-- Pilih Semester --</option>
                                        <option>Ganjil</option>
                                        <option>Genap</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pengampu</label>
                                    <select name="pengampu" id="pengampu" class="form-control">
                                        <option value="">-- Pilih Pengampu --</option>
                                        <option>Hafidh</option>
                                        <option>Putra</option>
                                        <option>Andhika</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-5 mt-3">Ubah</button>
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