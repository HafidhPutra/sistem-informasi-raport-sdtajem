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
                    <h6 class="h4 m-0 font-weight-bold text-gray-800">Silahkan Pilih Angkatan Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <?php foreach ($masuk as $user) : ?>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-bottom-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                                                    ANGKATAN
                                                </div>
                                            </div>
                                            <div class="col-auto ">
                                                <a class="h1 mb-0 font-weight-bold text-primary" href="/admin/masuk_nilai/<?= $user['id_angkatan'] ?>">
                                                    <?= $user['tahun_angkatan'] ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


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