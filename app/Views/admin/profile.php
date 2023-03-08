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
                <div class="text-center">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                    </div><br>
                    <img class="rounded" src="<?= base_url('img/' . user()->user_img); ?>" alt="User Image" style="width:20%;">
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="card shadow col-auto text-center">
                            <div class="card-header py-3">
                                <h4 class="m-0 font-weight-bold text-primary"><?= user()->fullname; ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderedless-primary border-primary font-weight-bold" id="dataTable" width="100%" cellspacing="0">
                                        <tr class="text-left">
                                            <td>
                                                <i class="fas fa-user text-primary"></i>
                                            </td>
                                            <td width="1%">
                                                -</i>
                                            </td>
                                            <td>
                                                <?= user()->fullname; ?>
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td>
                                                <i class="far fa-map text-primary"></i>
                                            </td>
                                            <td width="1%">
                                                -</i>
                                            </td>
                                            <td>
                                                <?= user()->alamat; ?>
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td>
                                                <i class="far fa-envelope text-primary"></i>
                                            </td>
                                            <td width="1%">
                                                -</i>
                                            </td>
                                            <td>
                                                <?= user()->email; ?>
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td>
                                                <i class="fas fa-pen text-primary"></i>
                                            </td>
                                            <td width="1%">
                                                -</i>
                                            </td>
                                            <td>
                                                <?= user()->no_id; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><br>
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