<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Admin</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->

                            <div class="text-center">
                                 <img class="rounded mx-auto" src="<?= base_url('img/' . $user->user_img) ?>" alt="User Image" style="width:20%;">
                            </div>&emsp;

                            <table class="table table-hover table-bordered table-striped">
                                <img class="mb-3" src="" style="width: 12%">

                                <tr>
                                    <td width="3%">1</td>
                                    <td width="20%">Nama Admin</td>
                                    <td width="1%">:</td>
                                    <td><?= $user->username; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">2</td>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $user->alamat; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">2</td>
                                    <td>Nomor Telefon</td>
                                    <td>:</td>
                                    <td><?= $user->no_telp; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">3</td>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $user->email; ?></td>
                                </tr>

                            </table>

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