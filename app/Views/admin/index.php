<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <br>
    <div class="h3 mb-0 font-weight-bold text-gray-800">Selamat Datang
        <a class="h2 mb-0 font-weight-bold text-primary"><?= user()->fullname; ?></a>
    </div><br>
    <div class="h5 mb-0 font-weight-bold text-gray-800">Di Sistem Informasi Raport SD Negeri Tajem</div><br>

    <!-- Card Atas -->
    <div class="row">

        <!-- Siswa -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Siswa</div><br>
                            <div class="h2 mb-0 font-weight-bold text-gray-800">
                                <? echo ($data) ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-4x text-success hover-zoom"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Guru -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Guru</div><br>
                            <div class="h2 mb-0 font-weight-bold text-gray-800">9</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-4x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Admin</div><br>
                            <div class="h2 mb-0 font-weight-bold text-gray-800">3</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-4x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Card Bawah -->
    <div class="row">

        <!-- Mata Pelajaran -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Mata Pelajaran</div><br>
                            <div class="h2 mb-0 font-weight-bold text-gray-800">20</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-4x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kelas -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-dark text-uppercase mb-1">
                                Daftar Angkatan</div><br>
                            <div class="h2 mb-0 font-weight-bold text-gray-800">6</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-4x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cetak -->
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-danger text-uppercase mb-1">
                                Logout</div><br>
                            <div class="h2 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sign-out-alt fa-4x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<?= $this->endSection(); ?>