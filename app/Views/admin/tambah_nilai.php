<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="h3 m-0 font-weight-bold text-primary">Form Penilaian</h6>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="table-responsive font-weight-bold text-gray-700">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <form action="/admin/nilai_save/<?= $admin['id'] ?>" method="post">
                                <?= csrf_field(); ?>
                            <label class="h5 font-weight-bold text-primary">Pilih Tahun Ajaran</label>
                            <!-- Pilih Tahun Ajaran -->
                            <div class="form-group">
                                <select class="form-control form-control-user" name="id_tahun_ajaran">
                                        <option value="">-- Tahun Ajaran | Semester --</option>
                                        <?php foreach ($tahunajaran as $key) : ?>
                                            <option value="<?= $key['id_tahun_ajaran'] ?>"><?= $key['tahun_ajaran'] ?> &nbsp; | &nbsp; <?= $key['semester'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                            </div><br>

                            <!-- A -->
                            <label class="h5 font-weight-bold text-primary">A. SIKAP</label>
                            <div class="form-group">
                                <label>1. Sikap Spiritual</label>
                                <textarea class="form-control" name="nilai_spiritual" placeholder="Tambahkan Keterangan" style="height: 100px"></textarea>
                            </div>
                            <div class="form-group">
                                <label>2. Sikap Sosial</label>
                                <textarea class="form-control" name="nilai_sosial" placeholder="Tambahkan Keterangan" style="height: 100px"></textarea>
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- B -->
                            <label class="h5 font-weight-bold text-primary">B. PENGETAHUAN</label>

                            <div id="show-item">
                                <div class="form-group" id="row_item">
                                    <label>Mata Pelajaran</label>
                                    <select class="form-control form-control-user" name="id_mapel">
                                        <option value="">-- Kelas | Semester | Nama Mapel --</option>
                                        <?php foreach ($mapel as $key) : ?>
                                            <option value="<?= $key['id_mapel'] ?>"><?= $key['kelas'] ?> &nbsp; | &nbsp; <?= $key['semester'] ?> &nbsp; | &nbsp; <?= $key['nama_mapel'] ?></option>
                                        <?php endforeach; ?>
                                    </select><br>
                                    <label>Nilai Pengetahuan</label>
                                    <div class="dropdown-divider"></div>
                                    <div class="col font-weight-normal text-gray-900">
                                        <div class="row justify-content-between form-group">
                                            <div class="col">
                                                <label>- Nilai</label>
                                                <input type="text" class="form-control form-control-user" name="pengetahuan_nilai">
                                            </div>
                                            <div class="col">
                                                <label>- Predikat</label>
                                                <input type="text" class="form-control form-control-user" name="pengetahuan_predikat">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>- Deskripsi</label>
                                            <textarea class="form-control" name="pengetahuan_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>

                                    <label>Nilai Keterampilan</label>
                                    <div class="dropdown-divider"></div>
                                    <div class="col font-weight-normal text-gray-900">
                                        <div class="row justify-content-between form-group">
                                            <div class="col">
                                                <label>- Nilai</label>
                                                <input type="text" class="form-control form-control-user" name="keterampilan_nilai">
                                            </div>
                                            <div class="col">
                                                <label>- Predikat</label>
                                                <input type="text" class="form-control form-control-user" name="keterampilan_predikat">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>- Deskripsi</label>
                                            <textarea class="form-control" name="keterampilan_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="dropdown mb-4">
                                            <a href="#" class="btn btn-success add_item_btn" class="col align-self-end">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </a>
                                            <a href="#" class="btn btn-danger remove-btn" class="col align-self-end">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $(".add_item_btn").click(function(e) {
                                        e.preventDefault();
                                        $("#show-item").append('<div class="form-group" id="row_item"><label>Mata Pelajaran</label><select class="form-control form-control-user" name="id_mapel"><option value="">-- Kelas | Semester | Nama Mapel --</option><?php foreach ($mapel as $key) : ?><option value="<?= $key['id_mapel'] ?>"><?= $key['kelas'] ?> &nbsp; | &nbsp; <?= $key['semester'] ?> &nbsp; | &nbsp; <?= $key['nama_mapel']?></option><?php endforeach; ?></select><br><label>Nilai Pengetahuan</label><div class="dropdown-divider"></div><div class="col font-weight-normal text-gray-900"><div class="row justify-content-between form-group"><div class="col"><label>- Nilai</label><input type="text" class="form-control form-control-user" name="pengetahuan_nilai"></div><div class="col"><label>- Predikat</label><input type="text" class="form-control form-control-user" name="pengetahuan_predikat"></div></div><div class="form-group"><label>- Deskripsi</label><textarea class="form-control" name="pengetahuan_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea></div></div><div class="dropdown-divider"></div><label>Nilai Keterampilan</label<div class="dropdown-divider"></div><div class="col font-weight-normal text-gray-900"><div class="row justify-content-between form-group"><div class="col"><label>- Nilai</label><input type="text" class="form-control form-control-user" name="keterampilan_nilai"></div><div class="col"><label>- Predikat</label><input type="text" class="form-control form-control-user" name="keterampilan_predikat"></div></div><div class="form-group"><label>- Deskripsi</label><textarea class="form-control" name="keterampilan_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea></div></div><div class="p-2"><div class="dropdown mb-4"><a href="#" class="btn btn-success add_item_btn" class="col align-self-end"><span class="icon text-white-50"><i class="fas fa-plus"></i></span></a><a href="#" class="btn btn-danger remove-btn" class="col align-self-end"><span class="icon text-white-50"><i class="fas fa-minus"></i></span></a></div></div><div class="dropdown-divider"></div></div>');
                                    });
                                    $(document).on('click', '.remove-btn', function(e) {
                                        e.preventDefault();
                                        let row_item = $(this).parent().parent().parent();
                                        $(row_item).remove();
                                    });
                                });
                            </script>

                            

                            <!-- C -->
                            <label class="h5 font-weight-bold text-primary">C. EKSTRAKURIKULER</label>
                            <div id="show-item2">
                                <div class="form-group">
                                <label>Kegiatan Ekstrakurikuler</label>
                                <input type="text" class="form-control form-control-user" name="nama_ekstra"><br>

                                <div class="col font-weight-normal text-gray-900">
                                    <div class="row justify-content-between form-group">
                                        <div class="col">
                                            <label>- Nilai</label>
                                            <input type="text" class="form-control form-control-user" name="nilai_ekstra">
                                        </div>
                                        <div class="col">
                                            <label>- Keterangan</label>
                                            <input type="text" class="form-control form-control-user" name="catatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>

                                <div class="p-2">
                                    <div class="dropdown mb-4">
                                        <a href="#" class="btn btn-success btn-icon-split add_item_btn2" class="col align-self-end">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-icon-split remove-btn2" class="col align-self-end">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div></div>
                            </div>
                            

                            <script>
                                $(document).ready(function() {
                                    $(".add_item_btn2").click(function(e) {
                                        e.preventDefault();
                                        $("#show-item2").append('<div class="form-group"><label>Kegiatan Ekstrakurikuler</label><input type="text" class="form-control form-control-user"><br> <div class="col font-weight-normal text-gray-900"><div class="row justify-content-between form-group"><div class="col"><label>- Nilai</label><input type="text" class="form-control form-control-user"></div><div class="col"><label>- Keterangan</label><input type="text" class="form-control form-control-user"></div></div></div><div class="dropdown-divider"></div><div class="p-2"><div class="dropdown mb-4"><a href="#" class="btn btn-success btn-icon-split add_item_btn" class="col align-self-end"><span class="icon text-white-50"><i class="fas fa-plus"></i></span></a><a href="#" class="btn btn-danger btn-icon-split remove-btn" class="col align-self-end"><span class="icon text-white-50"><i class="fas fa-minus"></i></span></a></div></div><div class="dropdown-divider"></div></div>');
                                    });
                                    $(document).on("click", ".remove-btn2", function(e) {
                                        e.preventDefault();
                                        let row_item = $(this).parent().parent();
                                        $(row_item).remove();
                                    });
                                });
                            </script>

                            <!-- D -->
                            <label class="h5 font-weight-bold text-primary">D. SARAN-SARAN</label>
                            <div class="form-group">
                                <textarea class="form-control" name="saran" placeholder="Tambahkan Keterangan" style="height: 100px"></textarea>

                                <div class="dropdown-divider"></div>
                            </div>

                            <!-- E -->
                            <label class="h5 font-weight-bold text-primary">E. TINGGI DAN BERAT BADAN</label>
                            <div class="form-group">
                                <label>- Tinggi Badan</label>

                                <div class="col font-weight-normal text-gray-900">
                                    <div class="row justify-content-between form-group">
                                        <input type="text" class="form-control form-control-user" name="tinggi">
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>

                                <label>- Berat Badan</label>

                                <div class="col font-weight-normal text-gray-900">
                                    <div class="row justify-content-between form-group">
                                        <input type="text" class="form-control form-control-user" name="berat">
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                            </div>

                            <!-- F -->
                            <label class="h5 font-weight-bold text-primary">F. KONDISI KESEHATAN</label>
                            <div class="form-group">
                                <label>- Pendengaran</label>
                                <input type="text" class="form-control form-control-user" name="pendengaran">
                            </div>
                            <div class="form-group">
                                <label>- Penglihatan</label>
                                <input type="text" class="form-control form-control-user" name="penglihatan">
                            </div>
                            <div class="form-group">
                                <label>- Gigi</label>
                                <input type="text" class="form-control form-control-user" name="gigi">
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- G -->
                            <label class="h5 font-weight-bold text-primary">G. CATATAN PRESTASI</label>
                            <div id="show-item3">
                                <div class="form-group">
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <label>Jenis Prestasi</label>
                                        <input type="text" class="form-control form-control-user" name="jenis_prestasi"><br>
                                    </div>
                                    <div class="col">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control form-control-user" name="keterangan_prestasi">
                                    </div>
                                </div>
                                <div class="dropdown mb-4">
                                    <a href="#" class="btn btn-success btn-icon-split add_item_btn3" class="col align-self-end">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-icon-split remove-btn3" class="col align-self-end">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-minus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div></div>
                            

                            <script>
                                $(document).ready(function() {
                                    $(".add_item_btn3").click(function(e) {
                                        e.preventDefault();
                                        $("#show-item3").append('<div class="form-group"><div class="row justify-content-between"><div class="col"><label>Jenis Prestasi</label><input type="text" class="form-control form-control-user"><br></div><div class="col"><label>Keterangan</label><input type="text" class="form-control form-control-user"></div></div><div class="dropdown mb-4"><a href="#" class="btn btn-success btn-icon-split add_item_btn3" class="col align-self-end"><span class="icon text-white-50"><i class="fas fa-plus"></i></span></a><a href="#" class="btn btn-danger btn-icon-split remove-btn3" class="col align-self-end"><span class="icon text-white-50"><i class="fas fa-minus"></i></span></a></div></div>');
                                    });
                                    $(document).on("click", ".remove-btn3", function(e) {
                                        e.preventDefault();
                                        let row_item = $(this).parent().parent();
                                        $(row_item).remove();
                                    });
                                });
                            </script>

                            <!-- H -->
                            <label class="h5 font-weight-bold text-primary">H. KETIDAKHADIRAN</label>
                            <div class="form-group">
                                <label>- Sakit</label>
                                <input type="text" class="form-control form-control-user" name="sakit">
                            </div>
                            <div class="form-group">
                                <label>- Izin</label>
                                <input type="text" class="form-control form-control-user" name="izin">
                            </div>
                            <div class="form-group">
                                <label>- Tanpa Keterangan</label>
                                <input type="text" class="form-control form-control-user" name="tanpa_keterangan">
                            </div>

                            <div class="dropdown-divider"></div>
                    </div>


                    <div class="dropdown-divider"></div>
                </div>

                <button type=" submit" class="btn btn-primary mb-5 mt-3">Simpan</button>

                </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<?= $this->endSection(); ?>