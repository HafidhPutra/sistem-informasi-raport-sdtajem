<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <?php foreach ($nilai as $key) : ?>
            <h1 class="h3 mb-2 text-gray-800"><?= $key->fullname ?></h1>
            <?php endforeach; ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaturan Akun Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive font-weight-bold text-gray-700">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->

                            <?php foreach ($nilai as $key) : ?>
                            <form action="/admin/userupdate/<?= $key->id ?>" method="post">
                                <?= csrf_field(); ?>
                                <!-- Pengaturan Akun-->

                                <!-- <input type="hidden" name="id_user" class="form-control" autofocus value="<?= $key->id?>"><br> -->
                                <input type="hidden" name="user_id" class="form-control" autofocus value="<?= $key->user_id ?>">

<!--                                 <div class="form-group">
                                    <label class="h5 font-weight-bold text-gray-800">- Username</label>
                                    <input type="text" name="username" class="form-control" autofocus value="<?= $key->username ?>">
                                </div><br>
 -->
                                <!-- <div class="form-group">
                                    <label class="h5 font-weight-bold text-gray-800">- Level Pengguna</label><br>
                                    &emsp;<label>Masukan Angka</label><br>
                                    &emsp;<label class="h6 font-weight-bold text-primary">*1 = admin,</label>&nbsp;
                                    <label class="h6 font-weight-bold text-info"> 2 = guru,</label>&nbsp;
                                    <label class="h6 font-weight-bold text-danger"> 3 = siswa</label> 
                                    <input type="text" name="group_id" class="form-control" placeholder="<?= $key->name ?>"></label>
                                </div> -->

                                <div class="form-group">
                                    <label class="h5 font-weight-bold text-gray-800">Level Pengguna</label><br>
                                    <select name="group_id" class="form-control">
                                        <option>-- Masukan Level Pengguna --</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Guru</option>
                                        <option value="3">Siswa</option>
                                        <option value="4">Tidak Memiliki Hak Akses Apapun</option>
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