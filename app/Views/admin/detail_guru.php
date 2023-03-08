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
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Guru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <!-- Tambah Data -->

                            <div class="text-center">
                                 <img class="rounded mx-auto" src="<?= base_url('img/' . $detail['user_img']) ?>" alt="User Image" style="width:20%;">
                            </div>

                            <table class="table table-hover table-bordered table-striped">
                                <img class="mb-3" src="" style="width: 12%">

                                <tr>
                                    <td width="3%">1</td>
                                    <td width="20%">Nama Guru</td>
                                    <td width="1%">:</td>
                                    <td><?= $detail['fullname']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">2</td>
                                    <td>NUPTK</td>
                                    <td>:</td>
                                    <td><?= $detail['no_id']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">2</td>
                                    <td>NIP</td>
                                    <td>:</td>
                                    <td><?= $detail['nip']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">3</td>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $detail['tempat_lahir']; ?>,&nbsp;<?= $detail['tanggal_lahir']; ?></td>
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
                                    <td width="3%">6</td>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $detail['alamat']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">7</td>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $detail['email']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">12</td>
                                    <td>No Telepon</td>
                                    <td>:</td>
                                    <td><?= $detail['no_telp']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">12</td>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td><?= $detail['jabatan']; ?></td>
                                </tr>

                                <tr>
                                    <td width="3%">12</td>
                                    <td>Golongan</td>
                                    <td>:</td>
                                    <td><?= $detail['golongan']; ?></td>
                                </tr>
                            </table>

                           <!--  <div class="d-flex flex-row mb-3">
                                <div class="p-2">
                                    <a href="<?= base_url('admin/guru'); ?>" class="btn btn-primary btn-icon-split" class="col align-self-end">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                </div>
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
                                    <div class="dropdown mb-4">
                                        <a href="#" class="btn btn-danger btn-icon-split" class="col align-self-end">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-times"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </div>
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