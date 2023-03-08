<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Form Ubah Angkatan Siswa</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaturan Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive font-weight-bold text-gray-700">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->

                            <?php foreach ($nilai as $key) : ?>
                            <form action="/admin/editangkatanupdate/<?= $key->id ?>" method="post">
                                <?= csrf_field(); ?>
                                <!-- Pengaturan Akun-->

                                <!-- <input type="hidden" name="id_user" class="form-control" autofocus value="<?= $key->id?>"><br> -->
                                <?php foreach ($user as $us) : ?>
                                <input type="hidden" name="id_siswa" class="form-control" autofocus value="<?= $us['id_siswa'] ?>">
                                <?php endforeach; ?>

<!--                                 <div class="form-group">
                                    <label class="h5 font-weight-bold text-gray-800">- Username</label>
                                    <input type="text" name="username" class="form-control" autofocus value="<?= $key->username ?>">
                                </div><br>
 -->
                                <!-- <div class="form-group">
                                    <label>Masukan Angka</label><br>
                                    <label class="h6 font-weight-bold text-primary">*1 = 2017,</label>&nbsp;
                                    <label class="h6 font-weight-bold text-info"> 2 = 2018,</label>&nbsp;
                                    <label class="h6 font-weight-bold text-danger"> 3 = 2019, dst..</label> 
                                    <input type="text" name="id_angkatan" class="form-control" ></label>
                                </div> -->

                                <div class="form-group">
                                    <label class="h5 font-weight-bold text-gray-800">Tahun Angkatan</label>
                                    <select name="id_angkatan" class="form-control">
                                        <option>-- Masukan Tahun Angkatan --</option>
                                        <?php foreach ($angkatan as $ang) : ?>
                                        <option value="<?= $ang['id_angkatan'] ?>"><?= $ang['tahun_angkatan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>
                            </form>
                            <?php endforeach; ?>
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