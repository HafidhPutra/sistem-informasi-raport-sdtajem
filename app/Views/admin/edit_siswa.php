<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Form Ubah Data Siswa</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive font-weight-bold text-gray-700">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->
                            <form action="/admin/siswaupdate/<?= $admin['id'] ?>" method="post">
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label>Nama Peserta Didik</label>
                                    <input type="text" name="fullname" class="form-control" autofocus value="<?= $admin['fullname'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>NIS / NISN</label>
                                    <input type="text" name="no_id" class="form-control" autofocus value="<?= $admin['no_id'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" autofocus value="<?= $admin['tempat_lahir'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" autofocus value="<?= $admin['tanggal_lahir'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="<?= $admin['jenis_kelamin'] ?>">-- Pilih Jenis Kelamin --</option>
                                        <option>Laki-Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="<?= $admin['agama'] ?>">-- Pilih Agama --</option>
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
                                    <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Disini" style="height: 100px" autofocus value="<?= $admin['alamat'] ?>"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Nama Orang Tua</label>
                                    <input type="text" name="nama_ayah" class="form-control" autofocus value="<?= $admin['nama_ayah'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Foto</label><br>
                                    <input type="file" name="photo">
                                </div><br>

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