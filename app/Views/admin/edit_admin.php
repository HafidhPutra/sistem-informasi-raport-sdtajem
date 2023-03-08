<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Form Ubah Data Admin</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive font-weight-bold text-gray-700">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->

                            <form action="/admin/adminupdate/<?= $admin['id'] ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" name="nama" class="form-control" autofocus value="<?= $admin['fullname'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Disini" style="height: 100px" autofocus value="<?= $admin['alamat'] ?>"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Nomor Telefon</label>
                                    <input type="text" name="no_telp" class="form-control" autofocus value="<?= $admin['no_telp'] ?>">
                                </div>


                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="tempat" class="form-control" autofocus value="<?= $admin['email'] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="formFile" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="user_img">
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