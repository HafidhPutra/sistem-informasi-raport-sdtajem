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
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Peserta Didik</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->

                            <!-- <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div col-auto style="font-size:250%;">
                                        <?= $detail['fullname']; ?>
                                    </div>
                                </div>&emsp;
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div col-auto style="font-size:150%;">
                                        <?= $detail['no_id']; ?>
                                    </div>
                                </div>&emsp;
                            </div> -->

                            <div class="text-center">
                                 <img class="rounded mx-auto" src="<?= base_url('img/' . $detail['user_img']) ?>" alt="User Image" style="width:20%;">
                            </div>

                            <table class="table table-hover table-bordered table-striped">
                                <img class="mb-3" src="" style="width: 12%">

                                <tr>
                                    <td width="3%">1</td>
                                    <td width="20%">Nama Peserta Didik</td>
                                    <td width="1%">:</td>
                                    <td><?= $detail['fullname']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">2</td>
                                    <td>NIS / NISN</td>
                                    <td>:</td>
                                    <td><?= $detail['no_id']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">3</td>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $detail['tempat_lahir']; ?>, &nbsp;<?= $detail['tanggal_lahir']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">4</td>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $detail['jenis_kelamin']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">5</td>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td><?= $detail['agama']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">7</td>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $detail['alamat']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">7</td>
                                    <td>Nama Orang Tua</td>
                                    <td>:</td>
                                    <td><?= $detail['nama_ayah']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">12</td>
                                    <td>Tahun Angkatan</td>
                                    <td>:</td>
                                    <td></td>
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