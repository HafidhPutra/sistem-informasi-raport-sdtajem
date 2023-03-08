<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Form Tambah Data Guru</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                </div>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <div class="card-body">
                    <div class="table-responsive font-weight-bold text-gray-700">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <form action="<?= route_to('register') ?>" method="post" class="user">
                                <?= csrf_field() ?>
                                <!-- Tambah Data -->
                                <div class="form-group">
                                    <label>Nama Guru</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" aria-describedby="fullnameHelp" value="<?= old('fullname') ?>">
                                </div>

                                <div class="form-group">
                                    <label>NUPTK</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.no_id')) : ?>is-invalid<?php endif ?>" name="no_id" aria-describedby="no_idHelp" value="<?= old('no_id') ?>">
                                </div>

                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.nip')) : ?>is-invalid<?php endif ?>" name="nip" aria-describedby="nipHelp" value="<?= old('nip') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.tempat_lahir')) : ?>is-invalid<?php endif ?>" name="tempat_lahir" aria-describedby="tempat_lahirHelp" value="<?= old('tempat_lahir') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user <?php if (session('errors.tanggal_lahir')) : ?>is-invalid<?php endif ?>" name="tanggal_lahir" aria-describedby="tanggal_lahirHelp" value="<?= old('tanggal') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control form-control-user <?php if (session('errors.jenis_kelamin')) : ?>is-invalid<?php endif ?>" name="jenis_kelamin" aria-describedby="jenis_kelaminHelp" value="<?= old('jenis_kelamin') ?>">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option>Laki-Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control form-control-user <?php if (session('errors.agama')) : ?>is-invalid<?php endif ?>" name="agama" aria-describedby="agamaHelp" value="<?= old('agama') ?>">
                                        <option value="">-- Pilih Agama --</option>
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Katolik</option>
                                        <option>Hindu</option>
                                        <option>Buddha</option>
                                        <option>Kong Hu Cu</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control form-control-user <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" aria-describedby="alamatHelp" value="<?= old('alamat') ?>"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" value="<?= old('email') ?>">
                                </div>

                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.no_telp')) : ?>is-invalid<?php endif ?>" name="no_telp" value="<?= old('no_telp') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.jabatan')) : ?>is-invalid<?php endif ?>" name="jabatan" value="<?= old('jabatan') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Golongan</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.golongan')) : ?>is-invalid<?php endif ?>" name="golongan" value="<?= old('golongan') ?>">
                                </div>



                                <div class="form-group">
                                    <label>Foto</label><br>
                                    <input type="file" name="photo">
                                </div><br>

                                <!-- Pengaturan Akun-->
                                <label class="font-weight-bold text-primary">Pengaturan Akun Pengguna</label><br>
                                <label class="font-weight-regular text-danger">*wajib diisi</label>
                                <div class="dropdown-divider"></div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <h6 class="font-weight-regular text-danger"></h6>
                                    <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                                    <small id="passwordHelpBlock" class="form-text text-danger">
                                        *Gunakan password yang sama dengan NIP
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label>Ulangi Password</label>
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