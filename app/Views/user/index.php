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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                            <div class="text-center">
                                 <img class="rounded mx-auto" src="<?= base_url('img/' . user()->user_img) ?>" alt="User Image" style="width:20%;">
                            </div>

                            <table class="table table-hover table-bordered table-striped">
                                <img class="mb-3" src="" style="width: 12%">

                                <tr>
                                    <td width="3%">1</td>
                                    <td width="20%">Nama Peserta Didik</td>
                                    <td width="1%">:</td>
                                    <td><?= user()->fullname; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">2</td>
                                    <td>NISN</td>
                                    <td>:</td>
                                    <td><?= user()->no_id; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">3</td>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= user()->tempat_lahir; ?>, <?= user()->tanggal_lahir; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">4</td>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= user()->jenis_kelamin; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">5</td>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td><?= user()->agama; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">6</td>
                                    <td>Alamat Peserta Didik</td>
                                    <td>:</td>
                                    <td><?= user()->alamat; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">7</td>
                                    <td>Nama Orang Tua</td>
                                    <td>:</td>
                                    <td><?= user()->nama_ayah; ?></td>
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