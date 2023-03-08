<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->

    <li class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-img justify-content-center">
            <img class="rounded" src="<?= base_url('img/' . user()->user_img); ?>" alt="User Image">
        </div>
    </li><br>
    <li class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3 justify-content-center"><?= user()->fullname; ?></div>
    </li>

    <?php if (in_groups('admin')) :  ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Main Navigation
        </div>

        <!-- Nav Item - Charts -->

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/index'); ?>">
                <i class="fas fa-home"></i>
                <span>Home</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Operasi
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesTwo" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-user-circle"></i>
                <span>Daftar Pengguna</span>
            </a>
            <div id="collapsePagesTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pengguna :</h6>
                    <a class="collapse-item" href="<?= base_url('admin/admin'); ?>">Admin</a>
                    <a class="collapse-item" href="<?= base_url('admin/guru'); ?>">Guru</a>
                    <a class="collapse-item" href="<?= base_url('admin/siswa'); ?>">Siswa</a>
                    <a class="collapse-item" href="<?= base_url('admin/pengaturan'); ?>">Pengaturan Pengguna</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePagesTwo">
                <i class="fas fa-graduation-cap"></i>
                <span>Akademik</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Akademik : </h6>
                    <a class="collapse-item" href="<?= base_url('admin/angkatan'); ?>">Angkatan</a>
                    <a class="collapse-item" href="<?= base_url('admin/angkatan_siswa'); ?>">Angkatan Siswa</a>
                    <a class="collapse-item" href="<?= base_url('admin/kelas'); ?>">Kelas</a>
                    <!-- <a class="collapse-item" href="<?= base_url('admin/mapel'); ?>">Mata Pelajaran</a> -->
                    <a class="collapse-item" href="<?= base_url('admin/tahun_ajaran'); ?>">Tahun Ajaran</a>
                    <a class="collapse-item" href="<?= base_url('admin/masuk_nilai'); ?>">Nilai</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <?php if (in_groups('guru')) :  ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Guru-->
        <div class="sidebar-heading">
            Menu Guru
        </div>

        <!-- Nav Item - Siswa -->

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('guru'); ?>">
                <i class="fas fa-home"></i>
                <span>Home</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('guru/edit_guru'); ?>">
                <i class="fas fa-user"></i>
                <span>Edit Profil</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('guru/masuk_nilai'); ?>">
                <i class="fas fa-book"></i>
                <span>Nilai</span></a>
        </li>
<!--         <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-print"></i>
                <span>Cetak Raport</span></a>
        </li> -->
    <?php endif; ?>

    <?php if (in_groups('siswa')) :  ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Siswa-->
        <div class="sidebar-heading">
            Menu Siswa
        </div>

        <!-- Nav Item - Siswa -->

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user'); ?>">
                <i class="fas fa-home"></i>
                <span>Home</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/nilai_mapel/<?= user()->id ?>">
                <i class="fas fa-book"></i>
                <span>Nilai</span></a>
        </li>
<!--         <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-print"></i>
                <span>Cetak Raport</span></a>
        </li> -->
    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>