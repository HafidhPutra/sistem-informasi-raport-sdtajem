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

                            <form action="/admin/nilai_save2/<?= $admin['id'] ?>" method="post">
                                <?= csrf_field(); ?>
                            <label class="h5 font-weight-bold text-primary">Pilih Tahun Ajaran</label>
                            <!-- Pilih Tahun Ajaran -->
                            <div class="form-group">
                                <select class="form-control form-control-user" name="id_tahun_ajaran">
                                        <option value="">-- Tahun Ajaran | Semester -- </option>
                                        <?php foreach ($tahunajaran as $key) : ?>
                                            <option value="<?= $key['id_tahun_ajaran'] ?>"><?= $key['tahun_ajaran'] ?> &nbsp; | &nbsp; <?= $key['semester'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label class="h5 font-weight-bold text-primary">Kelas</label>
                                <select class="form-control form-control-user" name="id_kelas">
                                        <option value="">-- Kelas -- </option>
                                        <?php foreach ($kelas as $key) : ?>
                                            <option value="<?= $key['id_kelas'] ?>"><?= $key['nama_kelas'] ?> &nbsp; | &nbsp; <?= $key['id_kelas'] ?>
                                            </option>
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
                            <label class="h5 font-weight-bold text-primary">B. PENGETAHUAN</label><br>
                            <div class="dropdown-divider"></div>

                            <div id="show-item">
                                <div class="form-group" id="row_item">

                                    <!-- AGAMA -->
                                    <div>   
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Pendidikan Agama dan Budi Pekerti </label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai /</label>
                                                    <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="agama_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="agama_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="agama_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="agama_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="agama_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="agama_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <!-- PANCASILA --> 
                                    <div>  
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Pendidikan Pancasila dan Kewarganegaraan </label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai /</label>
                                                    <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="pancasila_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="pancasila_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="pancasila_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="pancasila_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="pancasila_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="pancasila_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <!-- INDONESIA --> 
                                    <div>  
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Bahasa Indonesia</label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai /</label>
                                                    <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="indonesia_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="indonesia_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="indonesia_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="indonesia_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="indonesia_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="indonesia_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <!-- MATEMATIKA --> 
                                    <div>  
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Matematika</label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                     <label>- Nilai /</label>
                                                     <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="matematika_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="matematika_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="matematika_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="matematika_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="matematika_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="matematika_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <!-- IPA --> 
                                    <div>  
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Ilmu Pengetahuan Alam</label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                     <label>- Nilai /</label>
                                                     <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="ipa_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="ipa_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="ipa_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="ipa_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="ipa_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="ipa_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <!-- IPS --> 
                                    <div>  
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Ilmu Pengetahuan Sosial</label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                     <label>- Nilai /</label>
                                                     <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="ips_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="ips_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="ips_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="ips_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="ips_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="ips_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <!-- SENI --> 
                                    <div>  
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Seni Budaya dan Prakarya</label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai /</label>
                                                    <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="seni_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="seni_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="seni_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="seni_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="seni_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="seni_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <!-- PJOK --> 
                                    <div>  
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Pendidikan Jasmani, Olahraga, dan Kesehatan</label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                     <label>- Nilai /</label>
                                                     <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="pjok_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="pjok_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="pjok_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="pjok_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="pjok_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="pjok_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <!-- JAWA --> 
                                    <div>  
                                        <label class="h5 font-weight-bold">Mata Pelajaran : </label>
                                        <label class="h5 font-weight-bold text-primary">Muatan Lokal : Bahasa Jawa</label>
                                        <br>
                                        <label>1. Nilai Pengetahuan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                     <label>- Nilai /</label>
                                                     <label class="h6 font-weight-bold text-primary">Nilai Akhir</label>
                                                    <input type="text" class="form-control form-control-user" name="jawa_p_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="jawa_p_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Capaian</label>
                                                <textarea class="form-control" name="jawa_p_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <label>2. Nilai Keterampilan</label>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="jawa_k_nilai">
                                                </div>
                                                <div class="col">
                                                    <label>- Predikat</label>
                                                    <input type="text" class="form-control form-control-user" name="jawa_k_predikat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>- Deskripsi /</label>
                                                <label class="h6 font-weight-bold text-primary">Peningkatan</label>
                                                <textarea class="form-control" name="jawa_k_deskripsi" placeholder="Tambah Deskripsi" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                </div>
                            </div>

                            <!-- C -->
                            <label class="h5 font-weight-bold text-primary">C. EKSTRAKURIKULER</label>
                            <div id="show-item2">
                                <div>
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
                                        <div class="dropdown-divider"></div></div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label>Kegiatan Ekstrakurikuler</label>
                                        <input type="text" class="form-control form-control-user" name="nama_ekstra2"><br>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="nilai_ekstra2">
                                                </div>
                                                <div class="col">
                                                    <label>- Keterangan</label>
                                                    <input type="text" class="form-control form-control-user" name="catatan2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div></div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label>Kegiatan Ekstrakurikuler</label>
                                        <input type="text" class="form-control form-control-user" name="nama_ekstra3"><br>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="nilai_ekstra3">
                                                </div>
                                                <div class="col">
                                                    <label>- Keterangan</label>
                                                    <input type="text" class="form-control form-control-user" name="catatan3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div></div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label>Kegiatan Ekstrakurikuler</label>
                                        <input type="text" class="form-control form-control-user" name="nama_ekstra4"><br>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="nilai_ekstra4">
                                                </div>
                                                <div class="col">
                                                    <label>- Keterangan</label>
                                                    <input type="text" class="form-control form-control-user" name="catatan4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div></div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label>Kegiatan Ekstrakurikuler</label>
                                        <input type="text" class="form-control form-control-user" name="nama_ekstra5"><br>
                                        <div class="col font-weight-normal text-gray-900">
                                            <div class="row justify-content-between form-group">
                                                <div class="col">
                                                    <label>- Nilai</label>
                                                    <input type="text" class="form-control form-control-user" name="nilai_ekstra5">
                                                </div>
                                                <div class="col">
                                                    <label>- Keterangan</label>
                                                    <input type="text" class="form-control form-control-user" name="catatan5">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div></div>
                                </div>
                                
                            </div>

                            <!-- D -->
                            <label class="h5 font-weight-bold text-primary">D. SARAN-SARAN / CATATAN WALI KELAS </label>
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
                                    <div class="dropdown-divider"></div>
                                </div>

                                <div class="form-group">
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <label>Jenis Prestasi</label>
                                            <input type="text" class="form-control form-control-user" name="jenis_prestasi2"><br>
                                        </div>
                                        <div class="col">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control form-control-user" name="keterangan_prestasi2">
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                </div>

                                <div class="form-group">
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <label>Jenis Prestasi</label>
                                            <input type="text" class="form-control form-control-user" name="jenis_prestasi3"><br>
                                        </div>
                                        <div class="col">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control form-control-user" name="keterangan_prestasi3">
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                </div>

                                <div class="form-group">
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <label>Jenis Prestasi</label>
                                            <input type="text" class="form-control form-control-user" name="jenis_prestasi4"><br>
                                        </div>
                                        <div class="col">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control form-control-user" name="keterangan_prestasi4">
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                </div>

                                <div class="form-group">
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <label>Jenis Prestasi</label>
                                            <input type="text" class="form-control form-control-user" name="jenis_prestasi5"><br>
                                        </div>
                                        <div class="col">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control form-control-user" name="keterangan_prestasi5">
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                </div>
                            
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