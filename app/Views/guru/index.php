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

                            <!-- Tambah Data -->

                            <!-- <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div col-auto style="font-size:250%;">
                                        <?= user()->fullname; ?>
                                    </div>
                                </div>&emsp;
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div col-auto style="font-size:150%;">
                                        L200180085
                                    </div>
                                </div>&emsp;
                            </div> -->

                            <div class="text-center">
                                 <img class="rounded mx-auto" src="<?= base_url('img/' . user()->user_img) ?>" alt="User Image" style="width:20%;">
                            </div>

                            <table class="table table-hover table-bordered table-striped">
                                <img class="mb-3" src="" style="width: 12%">

                                <tr>
                                    <td width="3%">1</td>
                                    <td width="20%">Nama Guru</td>
                                    <td width="1%">:</td>
                                    <td><?= user()->fullname; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">2</td>
                                    <td>NUPTK</td>
                                    <td>:</td>
                                    <td><?= user()->no_id; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">3</td>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= user()->tempat_lahir; ?>, &nbsp;<?= user()->tanggal_lahir; ?></td>
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
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= user()->alamat; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">7</td>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= user()->email; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">12</td>
                                    <td>No Telepon</td>
                                    <td>:</td>
                                    <td><?= user()->no_telp; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">12</td>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td><?= user()->jabatan; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">12</td>
                                    <td>Golongan</td>
                                    <td>:</td>
                                    <td><?= user()->golongan; ?></td>
                                </tr>
                            </table>

                            <!-- <div class="d-flex flex-row mb-3">
                                <div class="p-2">
                                    <div class="dropdown mb-4">
                                        <a href="<?= base_url('admin/edit_guru'); ?>" class="btn btn-info btn-icon-split" class="col align-self-end">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-2">
                                </div>
                            </div> -->
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