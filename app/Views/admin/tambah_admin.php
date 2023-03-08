<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Form Tambah Data Admin</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive font-weight-bold text-gray-700">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <form action="<?= route_to('register') ?>" method="post">
                                <?= csrf_field() ?>

                                <!-- Tambah Data -->
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" value="<?= old('fullname') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control form-control-user <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" value="<?= old('alamat') ?>"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Nomor Telefon</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.no_telp')) : ?>is-invalid<?php endif ?>" name="no_telp" value="<?= old('no_telp') ?>">
                                </div>


                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" value="<?= old('email') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Foto</label><br>
                                    <input type="file" class="form-control form-control-user <?php if (session('errors.user_img')) : ?>is-invalid<?php endif ?>" name="user_img" aria-describedby="user_imgHelp" value="<?= old('user_img') ?>">
                                </div><br>

                                <!-- Pengaturan Akun-->
                                <label class="font-weight-bold text-primary">Pengaturan Akun Pengguna</label>
                                <div class="dropdown-divider"></div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Password</label><br>
                                    <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Ulangi Password</label><br>
                                    <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    <?= lang('Auth.register') ?>
                                </button>

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