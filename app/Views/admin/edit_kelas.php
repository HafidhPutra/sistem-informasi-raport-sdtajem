<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Form Ubah Data Kelas</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Angkatan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <form action="/admin/kelasupdate/<?= $kelasGuru['id_kelas_guru'] ?>" method="post">
                                <?= csrf_field(); ?>

                                <!-- Tambah Data -->
                                <input type="hidden" class="form-control form-control-user" name="id_kelas_guru" autofocus value="<?= $kelasGuru['id_kelas_guru'] ?>">

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="id_kelas" class="form-control">
                                        <option>-- Pilih Kelas --</option>
                                        <?php foreach ($kelas as $kel) : ?>
                                        <option value="<?= $kel['id_kelas'] ?>"><?= $kel['nama_kelas'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Wali Kelas</label>
                                    <select name="id_guru" class="form-control">
                                        <option>-- Pilih Wali Kelas --</option>
                                        <?php foreach ($guru as $ang) : ?>
                                        <option value="<?= $ang->user_id ?>, S.Pd."><?= $ang->fullname ?>, S.Pd.</option>
                                        <?php endforeach; ?>
                                    </select>
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