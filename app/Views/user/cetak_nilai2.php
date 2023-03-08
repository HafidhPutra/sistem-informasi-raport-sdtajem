<html>
<head></head>
<body>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <center><h3>Laporan Hasil Belajar (Rapor)</h3></center>
                </div>
                <div class="card-body">

                    <!-- Tambah Data -->


                    <div class="table-responsive">
                        <?php foreach ($detail as $user) : ?>
                        <table class="table table-bordered table-sm h6 font-weight-bold text-gray-800" width="100%">   
                            <tr>
                                <td width="60">
                                    Nama
                                </td>
                                <td width="20">
                                    :
                                </td>
                                <td width="">
                                    <?= $user->fullname ?>
                                </td>

                                <td width=""> 
                                </td>

                                <td width="130">
                                    Kelas    
                                </td>
                                <td width="20">
                                    :
                                </td>
                                <td width="120">
                                    <?= $user->nama_kelas ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    NISN
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $user->no_id ?>
                                </td>
                                <td></td>
                                <td>
                                    Semester
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $user->semester ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                   Sekolah
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    SD NEGERI TAJEM
                                </td>
                                <td></td>
                                <td>
                                    Tahun Pelajaran
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $user->tahun_ajaran ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Alamat
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    Banjeng
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>

                        <!--Pengetahuan -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="50%">
                            <thead>
                                <tr>
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">A. PENGETAHUAN DAN KETERAMPILAN</h6>
                                    <th width="1%" class="align-middle">No</th>
                                    <th width="20%" class="align-middle">Mata Pelajaran</th>
                                    <th class="text-center">Nilai Akhir</th>
                                    <th class="text-center">Capaian Kompetensi</th>
                                </tr>
                                <tr align="text-left">
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle">1</td>
                                    <td rowspan="2"  class="text-center align-middle">Pendidikan Agama dan Budi Pekerti</td>
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle"><?= $user->agama_p_nilai ?></td>
                                    <td><?= $user->agama_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                   <td><?= $user->agama_k_deskripsi ?></td> 
                                </tr>

                                <tr class="text-left">
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle">2</td>
                                    <td rowspan="2"  class="text-center align-middle">Pendidikan Pancasila dan Kewarganegaraan</td>
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle"><?= $user->pancasila_p_nilai ?></td>
                                    <td><?= $user->pancasila_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td><?= $user->pancasila_k_deskripsi ?></td>
                                </tr>

                                <tr class="text-left">
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle">3</td>
                                    <td rowspan="2"  class="text-center align-middle">Bahasa Indonesia</td>
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle"><?= $user->indonesia_p_nilai ?></td>
                                    <td><?= $user->indonesia_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td><?= $user->indonesia_k_deskripsi ?></td>
                                </tr>

                                <tr class="text-left">
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle">4</td>
                                    <td rowspan="2"  class="text-center align-middle">Matematika</td>
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle"><?= $user->matematika_p_nilai ?></td>
                                    <td><?= $user->matematika_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td><?= $user->matematika_k_deskripsi ?></td>
                                </tr>

                                <tr class="text-left">
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle">5</td>
                                    <td rowspan="2"  class="text-center align-middle">Ilmu Pengetahuan Alam</td>
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle"><?= $user->ipa_p_nilai ?></td>
                                    <td><?= $user->ipa_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td><?= $user->ipa_k_deskripsi ?></td>
                                </tr>

                                <tr class="text-left">
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle">6</td>
                                    <td rowspan="2"  class="text-center align-middle">Ilmu Pengetahuan Sosial</td>
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle"><?= $user->ips_p_nilai ?></td>
                                    <td><?= $user->ips_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td><?= $user->ips_k_deskripsi ?></td>
                                </tr>

                                <tr class="text-left">
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle">7</td>
                                    <td rowspan="2"  class="text-center align-middle">Seni Budaya dan Prakarya</td>
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle"><?= $user->seni_p_nilai ?></td>
                                    <td><?= $user->seni_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle"><?= $user->seni_k_deskripsi ?></td>
                                </tr>
                                <tr class="text-left">
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle">8</td>
                                    <td rowspan="2"  class="text-center align-middle">Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
                                    <td rowspan="2"  style="text-align: center" class="text-center align-middle"><?= $user->pjok_p_nilai ?></td>
                                    <td><?= $user->pjok_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td><?= $user->pjok_k_deskripsi ?></td>
                                </tr>

                                <tr class="text-left">
                                    <td rowspan="2" style="text-align: center" class="align-middle">9</td>
                                    <td rowspan="2" class="align-middle">Muatan Lokal : Bahasa Jawa</td>
                                    <td rowspan="2" style="text-align: center" class="text-center align-middle"><?= $user->jawa_p_nilai ?></td>
                                    <td><?= $user->jawa_p_deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td><?= $user->jawa_k_deskripsi ?></td>
                                </tr>
                            </thead>
                        </table><br><br><br><br>

                        <!--Ekskul -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="15%" id="dataTable" width="100%" cellspacing="0">
                            <thead height="20%">
                                <tr>
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">B. EKSTRAKURIKULER</h6>
                                    <th class="text-center" width="1%">No</th>
                                    <th class="text-center" width="30%">Kegiatan Ekstrakurikuler</th>
                                    <th class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center" class="text-center">1</td>
                                    <td><?= $user->nama_ekstra ?></td>
                                    <td><?= $user->catatan ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center" class="text-center">2</td>
                                    <td><?= $user->nama_ekstra2 ?></td>
                                    <td><?= $user->catatan2 ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center" class="text-center">3</td>
                                    <td><?= $user->nama_ekstra3 ?></td>
                                    <td><?= $user->catatan3 ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center" class="text-center">4</td>
                                    <td><?= $user->nama_ekstra4 ?></td>
                                    <td><?= $user->catatan4 ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center" class="text-center">5</td>
                                    <td><?= $user->nama_ekstra5 ?></td>
                                    <td><?= $user->catatan5 ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <!--Ketidakhadiran -->
                        <table style="border-collapse: collapse;" border="1" width="50%" height="7%" cellspacing="0">
                            <tbody height="35%">
                                <tr>
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">C. KETIDAKHADIRAN</h6>
                                    <th class="text-center" width="50%">Sakit</th>
                                    <th class="text-center" width="50%"><?= $user->sakit ?> hari</th>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr class="text-center">
                                    <th>Izin</th>
                                    <th><?= $user->izin ?> hari</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Tanpa Keterangan</th>
                                    <th><?= $user->tanpa_keterangan ?> hari</th>
                                </tr>
                            </tbody>
                        </table>

                        <!--Saran -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="10%" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">D. SARAN-SARAN</h6>
                                    <td style="text-align: center; font-style: italic; font-weight: bold; font-size: 16px" class="text-center" width="1%"><?= $user->saran ?></td>
                                </tr>
                                </tbody>

                        <table style="border-collapse: collapse;" width="100%">   
                            <br><br><tr>
                                <td width="40%">
                                    Mengetahui
                                </td>
                                <td width="30%">
                                </td>
                                <td width="40%">
                                    Kec. Depok
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Orang Tua/Wali
                                </td>
                                <td>
                                </td>
                                <td>
                                    Wali Kelas
                                </td>
                            </tr>

                            <tr height="70px">
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    ................................
                                </td>
                                <td>
                                </td>
                                <td>
                                    <u><?= $user->wali_kelas ?></u>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    NIP. <?= $user->id_wali_kelas ?>
                                </td>
                            </tr>                        </table><br>
                        </table>

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
<script type="text/javascript">
    window.print();
</script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

</body>
</html>