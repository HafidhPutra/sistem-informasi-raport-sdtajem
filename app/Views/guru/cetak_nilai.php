
<html>
<head>
    <title></title>
</head>
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
                    <center><h3>RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK</h3></center>
                </div>
                <div class="card-body">

                    <!-- Tambah Data -->


                    <div class="table-responsive">
                        <?php foreach ($detail as $user) : ?>
                        <table class="table table-borderless table-sm h6 font-weight-bold text-gray-800" width="100%">   
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
                        </table><br>

                        <!--Sikap -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="15%">
                            <thead>
                                <tr>
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">A. SIKAP</h4>
                                    <th colspan="2" class="text-center">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle" align="center" width="30%">1. Sikap Spiritual</td>
                                    <td align="center">
                                        <?= $user->nilai_spiritual ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle" align="center" width="30%">2. Sikap Sosial</td>
                                    <td align="center">
                                        <?= $user->nilai_sosial ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!--Pengetahuan -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="50%">
                            <thead>
                                <tr>
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">B. PENGETAHUAN DAN KETERAMPILAN</h4>
                                    <th rowspan="2" width="1%" class="align-middle">No</th>
                                    <th rowspan="2" width="20%" class="align-middle">Mata Pelajaran</th>
                                    <th colspan="3" class="text-center">Pengetahuan (K13)</th>
                                    <th colspan="3" class="text-center">Keterampilan (K14)</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Nilai</th>
                                    <th>Predikat</th>
                                    <th>Deskripsi</th>
                                    <th>Nilai</th>
                                    <th>Predikat</th>
                                    <th>Deskripsi</th>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">Pendidikan Agama dan Budi Pekerti</td>
                                    <td class="align-middle"><?= $user->agama_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->agama_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->agama_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->agama_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->agama_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->agama_k_deskripsi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">2</td>
                                    <td class="align-middle">Pendidikan Pancasila dan Kewarganegaraan</td>
                                    <td class="align-middle"><?= $user->pancasila_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->pancasila_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->pancasila_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->pancasila_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->pancasila_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->pancasila_k_deskripsi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">Bahasa Indonesia</td>
                                    <td class="align-middle"><?= $user->indonesia_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->indonesia_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->indonesia_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->indonesia_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->indonesia_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->indonesia_k_deskripsi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">4</td>
                                    <td class="align-middle">Matematika</td>
                                    <td class="align-middle"><?= $user->matematika_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->matematika_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->matematika_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->matematika_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->matematika_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->matematika_k_deskripsi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">5</td>
                                    <td class="align-middle">Ilmu Pengetahuan Alam</td>
                                    <td class="align-middle"><?= $user->ipa_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->ipa_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->ipa_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->ipa_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->ipa_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->ipa_k_deskripsi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">6</td>
                                    <td class="align-middle">Ilmu Pengetahuan Sosial</td>
                                    <td class="align-middle"><?= $user->ips_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->ips_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->ips_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->ips_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->ips_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->ips_k_deskripsi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">7</td>
                                    <td class="align-middle">Seni Budaya dan Prakarya</td>
                                    <td class="align-middle"><?= $user->seni_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->seni_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->seni_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->seni_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->seni_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->seni_k_deskripsi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">8</td>
                                    <td class="align-middle">Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
                                    <td class="align-middle"><?= $user->pjok_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->pjok_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->pjok_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->pjok_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->pjok_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->pjok_k_deskripsi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">9</td>
                                    <td class="align-middle">Muatan Lokal : Bahasa Jawa</td>
                                    <td class="align-middle"><?= $user->jawa_p_nilai ?></td>
                                    <td class="align-middle"><?= $user->jawa_p_predikat ?></td>
                                    <td class="align-middle"><?= $user->jawa_p_deskripsi ?></td>
                                    <td class="align-middle"><?= $user->jawa_k_nilai ?></td>
                                    <td class="align-middle"><?= $user->jawa_k_predikat ?></td>
                                    <td class="align-middle"><?= $user->jawa_k_deskripsi ?></td>
                                </tr>
                            </thead>
                        </table>

                        <!--Ekskul -->
                        <br><br><br><br><table style="border-collapse: collapse;" border="1" width="100%" height="15%">
                            <thead>
                                <tr align="center">
                                    <h4 class="h4 m-0 font-weight-bold text-gray-800">C. EKSTRAKURIKULER</h4>
                                    <th class="text-center" width="1%">No</th>
                                    <th class="text-center" width="30%">Kegiatan Ekstrakurikuler</th>
                                    <th class="text-center" width="7%">Nilai</th>
                                    <th class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td class="text-center">1</td>
                                    <td><?= $user->nama_ekstra ?></td>
                                    <td class="text-center"><?= $user->nilai_ekstra ?></td>
                                    <td class="text-center"><?= $user->catatan ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="text-center">2</td>
                                    <td><?= $user->nama_ekstra2 ?></td>
                                    <td class="text-center"><?= $user->nilai_ekstra2 ?></td>
                                    <td class="text-center"><?= $user->catatan2 ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="text-center">3</td>
                                    <td><?= $user->nama_ekstra3 ?></td>
                                    <td class="text-center"><?= $user->nilai_ekstra3 ?></td>
                                    <td class="text-center"><?= $user->catatan3 ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="text-center">4</td>
                                    <td><?= $user->nama_ekstra4 ?></td>
                                    <td class="text-center"><?= $user->nilai_ekstra4 ?></td>
                                    <td class="text-center"><?= $user->catatan4 ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="text-center">5</td>
                                    <td><?= $user->nama_ekstra5 ?></td>
                                    <td class="text-center"><?= $user->nilai_ekstra5 ?></td>
                                    <td class="text-center"><?= $user->catatan5 ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <!--Saran -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="10%" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">D. SARAN-SARAN</h4>
                                    <td style="text-align: center; font-style: italic; font-weight: bold; font-size: 16px" class="text-center" width="1%"><?= $user->saran ?></td>
                                </tr>
                                </tbody>
                        </table>

                        <!--Tinggi dan berat badan -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="15%">
                            <thead>
                                <tr align="center">
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">E. TINGGI DAN BERAT BADAN</h4>
                                    <th class="text-center" width="1%">No</th>
                                    <th class="text-center" width="20%">Aspek Yang Dinilai</th>
                                    <th class="text-center" width="25%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td class="align-middle">1</td>
                                    <td>Tinggi Badan</td>
                                    <td class="text-center"><?= $user->tinggi ?> cm</td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">1</td>
                                    <td>Berat Badan</td>
                                    <td class="text-center"><?= $user->berat ?> kg</td>

                                </tr>
                            </tbody>
                        </table>

                        <!--Kondisi Kesehatan -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="15%">
                            <thead>
                                <tr align="center">
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">F. KONDISI KESEHATAN</h4>
                                    <th class="text-center" width="1%">No</th>
                                    <th class="text-center" width="30%">Aspek Fisik</th>
                                    <th class="text-center">keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td class="align-middle">1</td>
                                    <td>Pendengaran</td>
                                    <td class="text-center"><?= $user->pendengaran ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="text-center">2</td>
                                    <td>Penglihatan</td>
                                    <td class="text-center"><?= $user->penglihatan ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">3</td>
                                    <td>Gigi</td>
                                    <td class="text-center"><?= $user->gigi ?></td>
                            </tbody>
                        </table>

                        <!--Catatan Prestasi -->
                        <table style="border-collapse: collapse;" border="1" width="100%" height="15%">
                            <thead>
                                <tr align="center">
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">G. CATATAN PRESTASI</h4>
                                    <th class="text-center" width="1%">No</th>
                                    <th class="text-center" width="30%">Jenis Prestasi</th>
                                    <th class="text-center">keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td class="align-middle">1</td>
                                    <td><?= $user->jenis_prestasi ?></td>
                                    <td class="text-center"><?= $user->keterangan_prestasi ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">2</td>
                                    <td><?= $user->jenis_prestasi2 ?></td>
                                    <td class="text-center"><?= $user->keterangan_prestasi2 ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">3</td>
                                    <td><?= $user->jenis_prestasi3 ?></td>
                                    <td class="text-center"><?= $user->keterangan_prestasi3 ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">4</td>
                                    <td><?= $user->jenis_prestasi4 ?></td>
                                    <td class="text-center"><?= $user->keterangan_prestasi4 ?></td>
                                </tr>
                                <tr align="center">
                                    <td class="align-middle">5</td>
                                    <td><?= $user->jenis_prestasi5 ?></td>
                                    <td class="text-center"><?= $user->keterangan_prestasi5 ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <!--Ketidakhadiran -->
                        <table style="border-collapse: collapse;" border="1" width="50%" height="7%" cellspacing="0">
                            <thead>
                                <tr>
                                    <h4 class="h5 m-0 font-weight-bold text-gray-800">H. KETIDAKHADIRAN</h4>
                                    <th class="text-center" width="50%">Sakit</th>
                                    <th class="text-center" width="50%"><?= $user->sakit ?> hari</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr class="text-center">
                                    <th>Izin</th>
                                    <th><?= $user->izin ?> hari</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Tanpa Keterangan</th>
                                    <th><?= $user->tanpa_keterangan ?> hari</th>
                                </tr>
                            </thead>
                        
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
