<?php

namespace App\Controllers;

class Guru extends BaseController
{
    public function index()
    {
        return view('guru/index');
    }
    public function masuk_nilai()
    {
        $masukModel = new \App\Models\MasukNilaiModel();
        $angkatanModel = new \App\Models\AngkatanModel();
        $angkatanNilai = $angkatanModel->findAll();
        

        $data = [
            'title' => 'Nilai',
            'masuk' => $angkatanModel->getAngkatan(),
            'angkatan' => $masukModel->getAll(),
            'count' => $angkatanModel->countAllResults()

        ];

        return view('guru/masuk_nilai', $data);
    }


    public function nilai($id_angkatan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user_angkatan');
        $builder->select('user_angkatan.id_angkatan, id_siswa, fullname, id, no_id, angkatan.tahun_angkatan, angkatan.id_angkatan');
        // $builder->join('user_angkatan', 'user_angkatan.id_angkatan = angkatan.id_angkatan');
        // $builder->join('angkatan', 'angkatan.id_angkatan = user_angkatan.id_ang');
        $builder->join('users', 'users.id = user_angkatan.id_siswa');
        $builder->join('angkatan', 'angkatan.id_angkatan = user_angkatan.id_angkatan');

        // $where = "id = '$id_angkatan'";
        $builder->where('user_angkatan.id_angkatan', $id_angkatan);
        $query = $builder->get();
        $data['nilai'] = $query->getResult();;

        // $angkatanModel = new \App\Models\AngkatanModel();
        // $data = [
        //     'angkatan' => $angkatanModel->getAngkatan($id_angkatan),
        //     'nilai' => $angkatanModel->getAll($id_angkatan)
        // ];
         // dd($data);

        return view('guru/nilai', $data);
    }

    public function nilai_mapel($id)
    {
        $tahunAjaranModel = new \App\Models\TahunAjaranModel();
        $tahunajaran = $tahunAjaranModel->findAll();
        $nilaiModel = new \App\Models\NilaiModel();
        $nilaiModel = $nilaiModel->findAll();
        $kelasModel = new \App\Models\KelasNilaiModel();
        $kelasModel = $kelasModel->findAll();
        $detailModel = new \App\Models\DetailModel();

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.fullname, nilai.id_nilai, nilai.id, nilai.id_tahun_ajaran, tahun_ajaran, semester, kelas_nilai.id_kelas, kelas_nilai.id_nilai, kelas.id_kelas, kelas.nama_kelas');
        // $builder->select('nilai.id_nilai, nilai.id, nilai.id_mapel, nilai.id_tahun_ajaran');
        $builder->join('nilai', 'nilai.id = users.id');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');
        $builder->join('kelas_nilai', 'kelas_nilai.id_nilai = nilai.id_nilai');
        $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');

        // $where = "id = '$id_angkatan'";
        $builder->where('users.id', $id);
        $query = $builder->get();
        $data = [
            'detail' => $detailModel->getGuru($id)

        ];
        $data['nilai'] = $query->getResult();



        // $data = [
        //     'nilai' => $nilaiModel->getNilai($id),

        // ];

        // $angkatanModel = new \App\Models\AngkatanModel();
        // $data = [
        //     'angkatan' => $angkatanModel->getAngkatan($id_angkatan),
        //     'nilai' => $angkatanModel->getAll($id_angkatan)
        // ];
        // dd($data);

        return view('guru/nilai_mapel', $data);
    }

    public function detail_nilai($id_nilai)
    {
        // $detailModel = new \App\Models\DetailModel();
        // $adminModel = new \App\Models\AdminModel();
        // $detailNilaiModel = new \App\Models\DetailNilaiModel();
        // // $tahunAjaranModel = new \App\Models\TahunAjaranModel();

        // $data = [
        //     'detail' => $detailNilaiModel->getAll($id_nilai),
        //     'users' => $detailModel->getGuru(),
        // ];


        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');

        $builder->select('nilai.id_nilai, nilai.id, nilai.id_tahun_ajaran, 
            users.id, users.fullname, users.no_id, 
            id_ekstra, nama_ekstra, nilai_ekstra, catatan, nama_ekstra2, nilai_ekstra2, catatan2, nama_ekstra3, nilai_ekstra3, catatan3, nama_ekstra4, nilai_ekstra4, catatan4, nama_ekstra5, nilai_ekstra5, catatan5, nilai_ekstra.id_nilai, 
            id_nilai_pasti, nilai_spiritual, nilai_sosial, saran, tinggi, berat, pendengaran, penglihatan, gigi, sakit, izin, tanpa_keterangan, nilai_pasti.id_nilai, 
            id_prestasi, jenis_prestasi, keterangan_prestasi, jenis_prestasi2, keterangan_prestasi2, jenis_prestasi3, keterangan_prestasi3, jenis_prestasi4, keterangan_prestasi4, jenis_prestasi5, keterangan_prestasi5, nilai_prestasi.id_nilai, 
            id_nilai_mapel, agama_p_nilai, agama_p_predikat, agama_p_deskripsi, agama_k_nilai, agama_k_predikat, agama_k_deskripsi, pancasila_p_nilai, pancasila_p_predikat, pancasila_p_deskripsi, pancasila_k_nilai, pancasila_k_predikat, pancasila_k_deskripsi, indonesia_p_nilai, indonesia_p_predikat, indonesia_p_deskripsi, indonesia_k_nilai, indonesia_k_predikat, indonesia_k_deskripsi, matematika_p_nilai, matematika_p_predikat, matematika_p_deskripsi, matematika_k_nilai, matematika_k_predikat, matematika_k_deskripsi, ipa_p_nilai, ipa_p_predikat, ipa_p_deskripsi, ipa_k_nilai, ipa_k_predikat, ipa_k_deskripsi, ips_p_nilai, ips_p_predikat, ips_p_deskripsi, ips_k_nilai, ips_k_predikat, ips_k_deskripsi, seni_p_nilai, seni_p_predikat, seni_p_deskripsi, seni_k_nilai, seni_k_predikat, seni_k_deskripsi, pjok_p_nilai, pjok_p_predikat, pjok_p_deskripsi, pjok_k_nilai, pjok_k_predikat, pjok_k_deskripsi, jawa_p_nilai, jawa_p_predikat, jawa_p_deskripsi, jawa_k_nilai, jawa_k_predikat, jawa_k_deskripsi, nilai_mapel.id_nilai, 
            tahun_ajaran.id_tahun_ajaran, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester, kelas_nilai.id_kelas, kelas_nilai.id_nilai, kelas.id_kelas, kelas.nama_kelas');

        $builder->join('users', 'users.id = nilai.id');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');
        $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id_nilai');
        $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id_nilai');
        $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id_nilai');
        $builder->join('nilai_mapel', 'nilai_mapel.id_nilai = nilai.id_nilai');
        $builder->join('kelas_nilai', 'kelas_nilai.id_nilai = nilai.id_nilai');
        $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');

        $builder->where('nilai.id_nilai', $id_nilai);

        $query = $builder->get();
        $data['detail'] = $query->getResult();

        // $data2 = [
        //     'user' => $detailModel->getGuru(),
        // ];

        // dd($data);

        return view('guru/detail_nilai', $data);
    }

    public function detail_nilai2($id_nilai)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');

        $builder->select('nilai.id_nilai, nilai.id, nilai.id_tahun_ajaran, 
            users.id, users.fullname, users.no_id, 
            id_ekstra, nama_ekstra, nilai_ekstra, catatan, nama_ekstra2, nilai_ekstra2, catatan2, nama_ekstra3, nilai_ekstra3, catatan3, nama_ekstra4, nilai_ekstra4, catatan4, nama_ekstra5, nilai_ekstra5, catatan5, nilai_ekstra.id_nilai, 
            id_nilai_pasti, nilai_spiritual, nilai_sosial, saran, tinggi, berat, pendengaran, penglihatan, gigi, sakit, izin, tanpa_keterangan, nilai_pasti.id_nilai, 
            id_prestasi, jenis_prestasi, keterangan_prestasi, jenis_prestasi2, keterangan_prestasi2, jenis_prestasi3, keterangan_prestasi3, jenis_prestasi4, keterangan_prestasi4, jenis_prestasi5, keterangan_prestasi5, nilai_prestasi.id_nilai, 
            id_nilai_mapel, agama_p_nilai, agama_p_predikat, agama_p_deskripsi, agama_k_nilai, agama_k_predikat, agama_k_deskripsi, pancasila_p_nilai, pancasila_p_predikat, pancasila_p_deskripsi, pancasila_k_nilai, pancasila_k_predikat, pancasila_k_deskripsi, indonesia_p_nilai, indonesia_p_predikat, indonesia_p_deskripsi, indonesia_k_nilai, indonesia_k_predikat, indonesia_k_deskripsi, matematika_p_nilai, matematika_p_predikat, matematika_p_deskripsi, matematika_k_nilai, matematika_k_predikat, matematika_k_deskripsi, ipa_p_nilai, ipa_p_predikat, ipa_p_deskripsi, ipa_k_nilai, ipa_k_predikat, ipa_k_deskripsi, ips_p_nilai, ips_p_predikat, ips_p_deskripsi, ips_k_nilai, ips_k_predikat, ips_k_deskripsi, seni_p_nilai, seni_p_predikat, seni_p_deskripsi, seni_k_nilai, seni_k_predikat, seni_k_deskripsi, pjok_p_nilai, pjok_p_predikat, pjok_p_deskripsi, pjok_k_nilai, pjok_k_predikat, pjok_k_deskripsi, jawa_p_nilai, jawa_p_predikat, jawa_p_deskripsi, jawa_k_nilai, jawa_k_predikat, jawa_k_deskripsi, nilai_mapel.id_nilai, 
            tahun_ajaran.id_tahun_ajaran, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester, kelas_nilai.id_kelas, kelas_nilai.id_nilai, kelas.id_kelas, kelas.nama_kelas');

        $builder->join('users', 'users.id = nilai.id');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');
        $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id_nilai');
        $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id_nilai');
        $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id_nilai');
        $builder->join('nilai_mapel', 'nilai_mapel.id_nilai = nilai.id_nilai');
        $builder->join('kelas_nilai', 'kelas_nilai.id_nilai = nilai.id_nilai');
        $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');

        $builder->where('nilai.id_nilai', $id_nilai);

        $query = $builder->get();
        $data['detail'] = $query->getResult();

        // $data2 = [
        //     'user' => $detailModel->getGuru(),
        // ];

        // dd($data);

        return view('guru/detail_nilai2', $data);
    }

    public function cetak_nilai($id_nilai)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');

        $builder->select('nilai.id_nilai, nilai.id, nilai.id_tahun_ajaran, 
            users.id, users.fullname, users.no_id, 
            id_ekstra, nama_ekstra, nilai_ekstra, catatan, nama_ekstra2, nilai_ekstra2, catatan2, nama_ekstra3, nilai_ekstra3, catatan3, nama_ekstra4, nilai_ekstra4, catatan4, nama_ekstra5, nilai_ekstra5, catatan5, nilai_ekstra.id_nilai, 
            id_nilai_pasti, nilai_spiritual, nilai_sosial, saran, tinggi, berat, pendengaran, penglihatan, gigi, sakit, izin, tanpa_keterangan, nilai_pasti.id_nilai, 
            id_prestasi, jenis_prestasi, keterangan_prestasi, jenis_prestasi2, keterangan_prestasi2, jenis_prestasi3, keterangan_prestasi3, jenis_prestasi4, keterangan_prestasi4, jenis_prestasi5, keterangan_prestasi5, nilai_prestasi.id_nilai, 
            id_nilai_mapel, agama_p_nilai, agama_p_predikat, agama_p_deskripsi, agama_k_nilai, agama_k_predikat, agama_k_deskripsi, pancasila_p_nilai, pancasila_p_predikat, pancasila_p_deskripsi, pancasila_k_nilai, pancasila_k_predikat, pancasila_k_deskripsi, indonesia_p_nilai, indonesia_p_predikat, indonesia_p_deskripsi, indonesia_k_nilai, indonesia_k_predikat, indonesia_k_deskripsi, matematika_p_nilai, matematika_p_predikat, matematika_p_deskripsi, matematika_k_nilai, matematika_k_predikat, matematika_k_deskripsi, ipa_p_nilai, ipa_p_predikat, ipa_p_deskripsi, ipa_k_nilai, ipa_k_predikat, ipa_k_deskripsi, ips_p_nilai, ips_p_predikat, ips_p_deskripsi, ips_k_nilai, ips_k_predikat, ips_k_deskripsi, seni_p_nilai, seni_p_predikat, seni_p_deskripsi, seni_k_nilai, seni_k_predikat, seni_k_deskripsi, pjok_p_nilai, pjok_p_predikat, pjok_p_deskripsi, pjok_k_nilai, pjok_k_predikat, pjok_k_deskripsi, jawa_p_nilai, jawa_p_predikat, jawa_p_deskripsi, jawa_k_nilai, jawa_k_predikat, jawa_k_deskripsi, nilai_mapel.id_nilai, 
            tahun_ajaran.id_tahun_ajaran, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester, kelas_nilai.id_kelas, kelas_nilai.id_nilai, kelas.id_kelas, kelas.nama_kelas, kelas.wali_kelas, kelas.id_wali_kelas');

        $builder->join('users', 'users.id = nilai.id');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');
        $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id_nilai');
        $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id_nilai');
        $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id_nilai');
        $builder->join('nilai_mapel', 'nilai_mapel.id_nilai = nilai.id_nilai');
        $builder->join('kelas_nilai', 'kelas_nilai.id_nilai = nilai.id_nilai');
        $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');

        $builder->where('nilai.id_nilai', $id_nilai);

        $query = $builder->get();
        $data['detail'] = $query->getResult();

        // $data2 = [
        //     'user' => $detailModel->getGuru(),
        // ];

        // dd($data);

        return view('guru/cetak_nilai', $data);
    }

    public function cetak_nilai2($id_nilai)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');

        $builder->select('nilai.id_nilai, nilai.id, nilai.id_tahun_ajaran, 
            users.id, users.fullname, users.no_id, 
            id_ekstra, nama_ekstra, nilai_ekstra, catatan, nama_ekstra2, nilai_ekstra2, catatan2, nama_ekstra3, nilai_ekstra3, catatan3, nama_ekstra4, nilai_ekstra4, catatan4, nama_ekstra5, nilai_ekstra5, catatan5, nilai_ekstra.id_nilai, 
            id_nilai_pasti, nilai_spiritual, nilai_sosial, saran, tinggi, berat, pendengaran, penglihatan, gigi, sakit, izin, tanpa_keterangan, nilai_pasti.id_nilai, 
            id_prestasi, jenis_prestasi, keterangan_prestasi, jenis_prestasi2, keterangan_prestasi2, jenis_prestasi3, keterangan_prestasi3, jenis_prestasi4, keterangan_prestasi4, jenis_prestasi5, keterangan_prestasi5, nilai_prestasi.id_nilai, 
            id_nilai_mapel, agama_p_nilai, agama_p_predikat, agama_p_deskripsi, agama_k_nilai, agama_k_predikat, agama_k_deskripsi, pancasila_p_nilai, pancasila_p_predikat, pancasila_p_deskripsi, pancasila_k_nilai, pancasila_k_predikat, pancasila_k_deskripsi, indonesia_p_nilai, indonesia_p_predikat, indonesia_p_deskripsi, indonesia_k_nilai, indonesia_k_predikat, indonesia_k_deskripsi, matematika_p_nilai, matematika_p_predikat, matematika_p_deskripsi, matematika_k_nilai, matematika_k_predikat, matematika_k_deskripsi, ipa_p_nilai, ipa_p_predikat, ipa_p_deskripsi, ipa_k_nilai, ipa_k_predikat, ipa_k_deskripsi, ips_p_nilai, ips_p_predikat, ips_p_deskripsi, ips_k_nilai, ips_k_predikat, ips_k_deskripsi, seni_p_nilai, seni_p_predikat, seni_p_deskripsi, seni_k_nilai, seni_k_predikat, seni_k_deskripsi, pjok_p_nilai, pjok_p_predikat, pjok_p_deskripsi, pjok_k_nilai, pjok_k_predikat, pjok_k_deskripsi, jawa_p_nilai, jawa_p_predikat, jawa_p_deskripsi, jawa_k_nilai, jawa_k_predikat, jawa_k_deskripsi, nilai_mapel.id_nilai, 
            tahun_ajaran.id_tahun_ajaran, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester, kelas_nilai.id_kelas, kelas_nilai.id_nilai, kelas.id_kelas, kelas.nama_kelas, kelas.wali_kelas, kelas.id_wali_kelas');

        $builder->join('users', 'users.id = nilai.id');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');
        $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id_nilai');
        $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id_nilai');
        $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id_nilai');
        $builder->join('nilai_mapel', 'nilai_mapel.id_nilai = nilai.id_nilai');
        $builder->join('kelas_nilai', 'kelas_nilai.id_nilai = nilai.id_nilai');
        $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');

        $builder->where('nilai.id_nilai', $id_nilai);

        $query = $builder->get();
        $data['detail'] = $query->getResult();

        // $data2 = [
        //     'user' => $detailModel->getGuru(),
        // ];

        // dd($data);

        return view('guru/cetak_nilai2', $data);
    }

    public function tambah_nilai($id)
    {
        $mapelModel = new \App\Models\MapelModel();
        $mapel = $mapelModel->findAll();

        $adminModel = new \App\Models\AdminModel();
        $admin = $adminModel->findAll();

        $tahunAjaranModel = new \App\Models\TahunAjaranModel();
        $tahunajaran = $tahunAjaranModel->findAll();

        

        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->select('nilai.id_nilai, nilai.id, nilai.id_mapel, nilai.id_tahun_ajaran, 
            id_ekstra, nama_ekstra, nilai_ekstra, catatan, nilai_ekstra.id_nilai, 
            id_nilai_pasti, nilai_spiritual, nilai_sosial, saran, tinggi, berat, pendengaran, penglihatan, gigi, sakit, izin, tanpa_keterangan, nilai_pasti.id_nilai, 
            id_nilai_pengetahuan, pengetahuan_nilai, pengetahuan_predikat, pengetahuan_deskripsi, keterampilan_nilai, keterampilan_predikat, keterampilan_deskripsi, nilai_pengetahuan.id_nilai, 
            id_prestasi, jenis_prestasi, keterangan_prestasi, nilai_prestasi.id_nilai, 
            mapel.nama_mapel, mapel.id_mapel');

        // $builder->from('nilai');
        // $builder->join('user_angkatan', 'user_angkatan.id_angkatan = angkatan.id_angkatan');
        // $builder->join('angkatan', 'angkatan.id_angkatan = user_angkatan.id_ang');
        $builder->join('users', 'users.id = nilai.id');
        $builder->join('mapel', 'mapel.id_mapel = nilai.id_mapel');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');

        // $builder->join('nilai','nilai.id = users.id');
        // $builder->join('nilai','nilai.id_mapel = mapel.id_mapel');
        // $builder->join('nilai','nilai.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran');


        $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id');
        $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id');
        $builder->join('nilai_pengetahuan', 'nilai_pengetahuan.id_nilai = nilai.id');
        $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id');

        // $where = "id = '$id_angkatan'";
        $builder->where('nilai.id', $id);
        $query = $builder->get();
        $data['nilai'] = $query->getResult();
        $data = [
            'mapel' => $mapelModel->getMapel(),
            'tahunajaran' => $tahunAjaranModel->getTahunAjaran(),
            'admin' => $adminModel->getAdmin($id)

        ];
 

        // dd($data);

        return view('guru/tambah_nilai', $data);
    }

    public function tambah_nilai2($id)
    {
        $mapelModel = new \App\Models\MapelModel();
        $mapel = $mapelModel->findAll();

        $adminModel = new \App\Models\AdminModel();
        $admin = $adminModel->findAll();

        $tahunAjaranModel = new \App\Models\TahunAjaranModel();
        $tahunajaran = $tahunAjaranModel->findAll();

        $kelasModel = new \App\Models\KelasModel();
        $kelas = $kelasModel->findAll();


        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->select('nilai.id_nilai, nilai.id, nilai.id_tahun_ajaran, 
            id_ekstra, nama_ekstra, nilai_ekstra, catatan, nama_ekstra2, nilai_ekstra2, catatan2, nama_ekstra3, nilai_ekstra3, catatan3, nama_ekstra4, nilai_ekstra4, catatan4, nama_ekstra5, nilai_ekstra5, catatan5, nilai_ekstra.id_nilai, 
            id_nilai_pasti, nilai_spiritual, nilai_sosial, saran, tinggi, berat, pendengaran, penglihatan, gigi, sakit, izin, tanpa_keterangan, nilai_pasti.id_nilai,  
            id_prestasi, jenis_prestasi, keterangan_prestasi, jenis_prestasi2, keterangan_prestasi2, jenis_prestasi3, keterangan_prestasi3, jenis_prestasi4, keterangan_prestasi4, jenis_prestasi5, keterangan_prestasi5, nilai_prestasi.id_nilai, kelas_nilai.id_kelas, kelas_nilai.id_nilai, kelas.id_kelas, kelas.nama_kelas');

        $builder->join('users', 'users.id = nilai.id');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');


        $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id');
        $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id');
        $builder->join('nilai_pengetahuan', 'nilai_pengetahuan.id_nilai = nilai.id');
        $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id');
        $builder->join('kelas_nilai', 'kelas_nilai.id_nilai = nilai.id_nilai');
        $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');

        // $where = "id = '$id_angkatan'";
        $builder->where('nilai.id', $id);
        $query = $builder->get();
        $data['nilai'] = $query->getResult();
        $data = [
            'mapel' => $mapelModel->getMapel(),
            'tahunajaran' => $tahunAjaranModel->getTahunAjaran(),
            'admin' => $adminModel->getAdmin($id),
            'kelas' => $kelasModel->getKelas()

        ];
 

        // dd($data);

        return view('guru/tambah_nilai2', $data);
    }

    public function edit_nilai($id_nilai)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');

        $builder->select('nilai.id_nilai, nilai.id, nilai.id_tahun_ajaran, 
            users.id, users.fullname, users.no_id, 
            id_ekstra, nama_ekstra, nilai_ekstra, catatan, nama_ekstra2, nilai_ekstra2, catatan2, nama_ekstra3, nilai_ekstra3, catatan3, nama_ekstra4, nilai_ekstra4, catatan4, nama_ekstra5, nilai_ekstra5, catatan5, nilai_ekstra.id_nilai, 
            id_nilai_pasti, nilai_spiritual, nilai_sosial, saran, tinggi, berat, pendengaran, penglihatan, gigi, sakit, izin, tanpa_keterangan, nilai_pasti.id_nilai, 
            id_prestasi, jenis_prestasi, keterangan_prestasi, jenis_prestasi2, keterangan_prestasi2, jenis_prestasi3, keterangan_prestasi3, jenis_prestasi4, keterangan_prestasi4, jenis_prestasi5, keterangan_prestasi5, nilai_prestasi.id_nilai, 
            id_nilai_mapel, agama_p_nilai, agama_p_predikat, agama_p_deskripsi, agama_k_nilai, agama_k_predikat, agama_k_deskripsi, pancasila_p_nilai, pancasila_p_predikat, pancasila_p_deskripsi, pancasila_k_nilai, pancasila_k_predikat, pancasila_k_deskripsi, indonesia_p_nilai, indonesia_p_predikat, indonesia_p_deskripsi, indonesia_k_nilai, indonesia_k_predikat, indonesia_k_deskripsi, matematika_p_nilai, matematika_p_predikat, matematika_p_deskripsi, matematika_k_nilai, matematika_k_predikat, matematika_k_deskripsi, ipa_p_nilai, ipa_p_predikat, ipa_p_deskripsi, ipa_k_nilai, ipa_k_predikat, ipa_k_deskripsi, ips_p_nilai, ips_p_predikat, ips_p_deskripsi, ips_k_nilai, ips_k_predikat, ips_k_deskripsi, seni_p_nilai, seni_p_predikat, seni_p_deskripsi, seni_k_nilai, seni_k_predikat, seni_k_deskripsi, pjok_p_nilai, pjok_p_predikat, pjok_p_deskripsi, pjok_k_nilai, pjok_k_predikat, pjok_k_deskripsi, jawa_p_nilai, jawa_p_predikat, jawa_p_deskripsi, jawa_k_nilai, jawa_k_predikat, jawa_k_deskripsi, nilai_mapel.id_nilai, 
            tahun_ajaran.id_tahun_ajaran, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester
            , kelas_nilai.id_kelas, kelas_nilai.id_nilai, kelas.id_kelas, kelas.nama_kelas');

        $builder->join('users', 'users.id = nilai.id');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');
        $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id_nilai');
        $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id_nilai');
        $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id_nilai');
        $builder->join('nilai_mapel', 'nilai_mapel.id_nilai = nilai.id_nilai');
        $builder->join('kelas_nilai', 'kelas_nilai.id_nilai = nilai.id_nilai');
        $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');

        $builder->where('nilai.id_nilai', $id_nilai);

        $query = $builder->get();
        $data['detail'] = $query->getResult();
 
        // dd($data);

        return view('guru/edit_nilai', $data);
    }

    public function nilai_update($id_nilai)
    {
        $nilaiModel = new \App\Models\NilaiModel();
        $nilaiMapelModel = new \App\Models\NilaiMapelModel();
        $ekstraModel = new \App\Models\EkstraModel();
        $pastiModel = new \App\Models\PastiModel();
        $pengetahuanModel = new \App\Models\PengetahuanModel();
        $prestasiModel = new \App\Models\PrestasiModel();
        $kelasModel = new \App\Models\KelasNilaiModel();

        $data0 = [
            'id_nilai' => $id_nilai,
            'id' => $this->request->getVar('id'),
            'id_tahun_ajaran' => $this->request->getVar('id_tahun_ajaran')
        ];
        $nilaiModel->replace($data0);
        
        $data1 = [
            'id_ekstra' => $this->request->getVar('id_ekstra'),
            'nama_ekstra' => $this->request->getVar('nama_ekstra'),
            'nilai_ekstra' => $this->request->getVar('nilai_ekstra'),
            'catatan' => $this->request->getVar('catatan'),

            'nama_ekstra2' => $this->request->getVar('nama_ekstra2'),
            'nilai_ekstra2' => $this->request->getVar('nilai_ekstra2'),
            'catatan2' => $this->request->getVar('catatan2'),

            'nama_ekstra3' => $this->request->getVar('nama_ekstra3'),
            'nilai_ekstra3' => $this->request->getVar('nilai_ekstra3'),
            'catatan3' => $this->request->getVar('catatan3'),

            'nama_ekstra4' => $this->request->getVar('nama_ekstra4'),
            'nilai_ekstra4' => $this->request->getVar('nilai_ekstra4'),
            'catatan4' => $this->request->getVar('catatan4'),

            'nama_ekstra5' => $this->request->getVar('nama_ekstra5'),
            'nilai_ekstra5' => $this->request->getVar('nilai_ekstra5'),
            'catatan5' => $this->request->getVar('catatan5'),

            'id_nilai' => $id_nilai
        ];
        $ekstraModel->replace($data1);

        $data2 = [
            'nilai_spiritual' => $this->request->getVar('nilai_spiritual'),
            'nilai_sosial' => $this->request->getVar('nilai_sosial'),
            'saran' => $this->request->getVar('saran'),
            'tinggi' => $this->request->getVar('tinggi'),
            'berat' => $this->request->getVar('berat'),
            'saran' => $this->request->getVar('saran'), 
            'pendengaran' => $this->request->getVar('pendengaran'),
            'penglihatan' => $this->request->getVar('penglihatan'),
            'gigi' => $this->request->getVar('gigi'),
            'sakit' => $this->request->getVar('sakit'),
            'izin' => $this->request->getVar('izin'),
            'tanpa_keterangan' => $this->request->getVar('tanpa_keterangan'),
            'id_nilai' => $id_nilai
        ];
        $pastiModel->replace($data2);

        $data3 = [
            'jenis_prestasi' => $this->request->getVar('jenis_prestasi'),
            'keterangan_prestasi' => $this->request->getVar('keterangan_prestasi'),

            'jenis_prestasi2' => $this->request->getVar('jenis_prestasi2'),
            'keterangan_prestasi2' => $this->request->getVar('keterangan_prestasi2'),

            'jenis_prestasi3' => $this->request->getVar('jenis_prestasi3'),
            'keterangan_prestasi3' => $this->request->getVar('keterangan_prestasi3'),

            'jenis_prestasi4' => $this->request->getVar('jenis_prestasi4'),
            'keterangan_prestasi4' => $this->request->getVar('keterangan_prestasi4'),

            'jenis_prestasi5' => $this->request->getVar('jenis_prestasi5'),
            'keterangan_prestasi5' => $this->request->getVar('keterangan_prestasi5'),

            'id_nilai' => $id_nilai
        ];
        $prestasiModel->replace($data3);


        $data4 = [
            'agama_p_nilai' => $this->request->getVar('agama_p_nilai'),
            'agama_p_predikat' => $this->request->getVar('agama_p_predikat'),
            'agama_p_deskripsi' => $this->request->getVar('agama_p_deskripsi'),
            'agama_k_nilai' => $this->request->getVar('agama_k_nilai'),
            'agama_k_predikat' => $this->request->getVar('agama_k_predikat'),
            'agama_k_deskripsi' => $this->request->getVar('agama_k_deskripsi'),

            'pancasila_p_nilai' => $this->request->getVar('pancasila_p_nilai'),
            'pancasila_p_predikat' => $this->request->getVar('pancasila_p_predikat'),
            'pancasila_p_deskripsi' => $this->request->getVar('pancasila_p_deskripsi'),
            'pancasila_k_nilai' => $this->request->getVar('pancasila_k_nilai'),
            'pancasila_k_predikat' => $this->request->getVar('pancasila_k_predikat'),
            'pancasila_k_deskripsi' => $this->request->getVar('pancasila_k_deskripsi'),

            'indonesia_p_nilai' => $this->request->getVar('indonesia_p_nilai'),
            'indonesia_p_predikat' => $this->request->getVar('indonesia_p_predikat'),
            'indonesia_p_deskripsi' => $this->request->getVar('indonesia_p_deskripsi'),
            'indonesia_k_nilai' => $this->request->getVar('indonesia_k_nilai'),
            'indonesia_k_predikat' => $this->request->getVar('indonesia_k_predikat'),
            'indonesia_k_deskripsi' => $this->request->getVar('indonesia_k_deskripsi'),


            'matematika_p_nilai' => $this->request->getVar('matematika_p_nilai'),
            'matematika_p_predikat' => $this->request->getVar('matematika_p_predikat'),
            'matematika_p_deskripsi' => $this->request->getVar('matematika_p_deskripsi'),
            'matematika_k_nilai' => $this->request->getVar('matematika_k_nilai'),
            'matematika_k_predikat' => $this->request->getVar('matematika_k_predikat'),
            'matematika_k_deskripsi' => $this->request->getVar('matematika_k_deskripsi'),

            'ipa_p_nilai' => $this->request->getVar('ipa_p_nilai'),
            'ipa_p_predikat' => $this->request->getVar('ipa_p_predikat'),
            'ipa_p_deskripsi' => $this->request->getVar('ipa_p_deskripsi'),
            'ipa_k_nilai' => $this->request->getVar('ipa_k_nilai'),
            'ipa_k_predikat' => $this->request->getVar('ipa_k_predikat'),
            'ipa_k_deskripsi' => $this->request->getVar('ipa_k_deskripsi'),


            'ips_p_nilai' => $this->request->getVar('ips_p_nilai'),
            'ips_p_predikat' => $this->request->getVar('ips_p_predikat'),
            'ips_p_deskripsi' => $this->request->getVar('ips_p_deskripsi'),
            'ips_k_nilai' => $this->request->getVar('ips_k_nilai'),
            'ips_k_predikat' => $this->request->getVar('ips_k_predikat'),
            'ips_k_deskripsi' => $this->request->getVar('ips_k_deskripsi'),

            'seni_p_nilai' => $this->request->getVar('seni_p_nilai'),
            'seni_p_predikat' => $this->request->getVar('seni_p_predikat'),
            'seni_p_deskripsi' => $this->request->getVar('seni_p_deskripsi'),
            'seni_k_nilai' => $this->request->getVar('seni_k_nilai'),
            'seni_k_predikat' => $this->request->getVar('seni_k_predikat'),
            'seni_k_deskripsi' => $this->request->getVar('seni_k_deskripsi'),

            'pjok_p_nilai' => $this->request->getVar('pjok_p_nilai'),
            'pjok_p_predikat' => $this->request->getVar('pjok_p_predikat'),
            'pjok_p_deskripsi' => $this->request->getVar('pjok_p_deskripsi'),
            'pjok_k_nilai' => $this->request->getVar('pjok_k_nilai'),
            'pjok_k_predikat' => $this->request->getVar('pjok_k_predikat'),
            'pjok_k_deskripsi' => $this->request->getVar('pjok_k_deskripsi'),

            'jawa_p_nilai' => $this->request->getVar('jawa_p_nilai'),
            'jawa_p_predikat' => $this->request->getVar('jawa_p_predikat'),
            'jawa_p_deskripsi' => $this->request->getVar('jawa_p_deskripsi'),
            'jawa_k_nilai' => $this->request->getVar('jawa_k_nilai'),
            'jawa_k_predikat' => $this->request->getVar('jawa_k_predikat'),
            'jawa_k_deskripsi' => $this->request->getVar('jawa_k_deskripsi'),

            'id_nilai' => $id_nilai
        ];
        $nilaiMapelModel->replace($data4);

        $data5 = [
            'id_kelas' => $this->request->getVar('id_kelas'),
            'id_nilai' => $id_nilai
        ];
        $kelasModel->replace($data5);


        session()->setFlashdata('pesan', 'Nilai Siswa Berhasil Ditambahkan');


        return redirect()->to('/guru/masuk_nilai');
    }


    public function nilai_save2($id)
    {
        $nilaiModel = new \App\Models\NilaiModel();
        $nilaiMapelModel = new \App\Models\NilaiMapelModel();
        $ekstraModel = new \App\Models\EkstraModel();
        $pastiModel = new \App\Models\PastiModel();
        $pengetahuanModel = new \App\Models\PengetahuanModel();
        $prestasiModel = new \App\Models\PrestasiModel();
        $kelasModel = new \App\Models\KelasNilaiModel();

        $nilaiModel->save([
            'id' => $id,
            'id_tahun_ajaran' => $this->request->getVar('id_tahun_ajaran')
        ]);

        $nilaiID = $nilaiModel->insertID();
        
        $data1 = [
            'nama_ekstra' => $this->request->getVar('nama_ekstra'),
            'nilai_ekstra' => $this->request->getVar('nilai_ekstra'),
            'catatan' => $this->request->getVar('catatan'),

            'nama_ekstra2' => $this->request->getVar('nama_ekstra2'),
            'nilai_ekstra2' => $this->request->getVar('nilai_ekstra2'),
            'catatan2' => $this->request->getVar('catatan2'),

            'nama_ekstra3' => $this->request->getVar('nama_ekstra3'),
            'nilai_ekstra3' => $this->request->getVar('nilai_ekstra3'),
            'catatan3' => $this->request->getVar('catatan3'),

            'nama_ekstra4' => $this->request->getVar('nama_ekstra4'),
            'nilai_ekstra4' => $this->request->getVar('nilai_ekstra4'),
            'catatan4' => $this->request->getVar('catatan4'),

            'nama_ekstra5' => $this->request->getVar('nama_ekstra5'),
            'nilai_ekstra5' => $this->request->getVar('nilai_ekstra5'),
            'catatan5' => $this->request->getVar('catatan5'),

            'id_nilai' => $nilaiID
        ];
        $ekstraModel->insert($data1);

        $data2 = [
            'nilai_spiritual' => $this->request->getVar('nilai_spiritual'),
            'nilai_sosial' => $this->request->getVar('nilai_sosial'),
            'saran' => $this->request->getVar('saran'),
            'tinggi' => $this->request->getVar('tinggi'),
            'berat' => $this->request->getVar('berat'),
            'saran' => $this->request->getVar('saran'), 
            'pendengaran' => $this->request->getVar('pendengaran'),
            'penglihatan' => $this->request->getVar('penglihatan'),
            'gigi' => $this->request->getVar('gigi'),
            'sakit' => $this->request->getVar('sakit'),
            'izin' => $this->request->getVar('izin'),
            'tanpa_keterangan' => $this->request->getVar('tanpa_keterangan'),
            'id_nilai' => $nilaiID
        ];
        $pastiModel->insert($data2);

        $data3 = [
            'jenis_prestasi' => $this->request->getVar('jenis_prestasi'),
            'keterangan_prestasi' => $this->request->getVar('keterangan_prestasi'),

            'jenis_prestasi2' => $this->request->getVar('jenis_prestasi2'),
            'keterangan_prestasi2' => $this->request->getVar('keterangan_prestasi2'),

            'jenis_prestasi3' => $this->request->getVar('jenis_prestasi3'),
            'keterangan_prestasi3' => $this->request->getVar('keterangan_prestasi3'),

            'jenis_prestasi4' => $this->request->getVar('jenis_prestasi4'),
            'keterangan_prestasi4' => $this->request->getVar('keterangan_prestasi4'),

            'jenis_prestasi5' => $this->request->getVar('jenis_prestasi5'),
            'keterangan_prestasi5' => $this->request->getVar('keterangan_prestasi5'),

            'id_nilai' => $nilaiID
        ];
        $prestasiModel->insert($data3);


        $data4 = [
            'agama_p_nilai' => $this->request->getVar('agama_p_nilai'),
            'agama_p_predikat' => $this->request->getVar('agama_p_predikat'),
            'agama_p_deskripsi' => $this->request->getVar('agama_p_deskripsi'),
            'agama_k_nilai' => $this->request->getVar('agama_k_nilai'),
            'agama_k_predikat' => $this->request->getVar('agama_k_predikat'),
            'agama_k_deskripsi' => $this->request->getVar('agama_k_deskripsi'),

            'pancasila_p_nilai' => $this->request->getVar('pancasila_p_nilai'),
            'pancasila_p_predikat' => $this->request->getVar('pancasila_p_predikat'),
            'pancasila_p_deskripsi' => $this->request->getVar('pancasila_p_deskripsi'),
            'pancasila_k_nilai' => $this->request->getVar('pancasila_k_nilai'),
            'pancasila_k_predikat' => $this->request->getVar('pancasila_k_predikat'),
            'pancasila_k_deskripsi' => $this->request->getVar('pancasila_k_deskripsi'),

            'indonesia_p_nilai' => $this->request->getVar('indonesia_p_nilai'),
            'indonesia_p_predikat' => $this->request->getVar('indonesia_p_predikat'),
            'indonesia_p_deskripsi' => $this->request->getVar('indonesia_p_deskripsi'),
            'indonesia_k_nilai' => $this->request->getVar('indonesia_k_nilai'),
            'indonesia_k_predikat' => $this->request->getVar('indonesia_k_predikat'),
            'indonesia_k_deskripsi' => $this->request->getVar('indonesia_k_deskripsi'),


            'matematika_p_nilai' => $this->request->getVar('matematika_p_nilai'),
            'matematika_p_predikat' => $this->request->getVar('matematika_p_predikat'),
            'matematika_p_deskripsi' => $this->request->getVar('matematika_p_deskripsi'),
            'matematika_k_nilai' => $this->request->getVar('matematika_k_nilai'),
            'matematika_k_predikat' => $this->request->getVar('matematika_k_predikat'),
            'matematika_k_deskripsi' => $this->request->getVar('matematika_k_deskripsi'),

            'ipa_p_nilai' => $this->request->getVar('ipa_p_nilai'),
            'ipa_p_predikat' => $this->request->getVar('ipa_p_predikat'),
            'ipa_p_deskripsi' => $this->request->getVar('ipa_p_deskripsi'),
            'ipa_k_nilai' => $this->request->getVar('ipa_k_nilai'),
            'ipa_k_predikat' => $this->request->getVar('ipa_k_predikat'),
            'ipa_k_deskripsi' => $this->request->getVar('ipa_k_deskripsi'),


            'ips_p_nilai' => $this->request->getVar('ips_p_nilai'),
            'ips_p_predikat' => $this->request->getVar('ips_p_predikat'),
            'ips_p_deskripsi' => $this->request->getVar('ips_p_deskripsi'),
            'ips_k_nilai' => $this->request->getVar('ips_k_nilai'),
            'ips_k_predikat' => $this->request->getVar('ips_k_predikat'),
            'ips_k_deskripsi' => $this->request->getVar('ips_k_deskripsi'),

            'seni_p_nilai' => $this->request->getVar('seni_p_nilai'),
            'seni_p_predikat' => $this->request->getVar('seni_p_predikat'),
            'seni_p_deskripsi' => $this->request->getVar('seni_p_deskripsi'),
            'seni_k_nilai' => $this->request->getVar('seni_k_nilai'),
            'seni_k_predikat' => $this->request->getVar('seni_k_predikat'),
            'seni_k_deskripsi' => $this->request->getVar('seni_k_deskripsi'),

            'pjok_p_nilai' => $this->request->getVar('pjok_p_nilai'),
            'pjok_p_predikat' => $this->request->getVar('pjok_p_predikat'),
            'pjok_p_deskripsi' => $this->request->getVar('pjok_p_deskripsi'),
            'pjok_k_nilai' => $this->request->getVar('pjok_k_nilai'),
            'pjok_k_predikat' => $this->request->getVar('pjok_k_predikat'),
            'pjok_k_deskripsi' => $this->request->getVar('pjok_k_deskripsi'),

            'jawa_p_nilai' => $this->request->getVar('jawa_p_nilai'),
            'jawa_p_predikat' => $this->request->getVar('jawa_p_predikat'),
            'jawa_p_deskripsi' => $this->request->getVar('jawa_p_deskripsi'),
            'jawa_k_nilai' => $this->request->getVar('jawa_k_nilai'),
            'jawa_k_predikat' => $this->request->getVar('jawa_k_predikat'),
            'jawa_k_deskripsi' => $this->request->getVar('jawa_k_deskripsi'),

            'id_nilai' => $nilaiID
        ];
        $nilaiMapelModel->insert($data4);

        $data5 = [
            'id_kelas' => $this->request->getVar('id_kelas'),
            'id_nilai' => $nilaiID
        ];
        $kelasModel->insert($data5);


        session()->setFlashdata('pesan', 'Nilai Siswa Berhasil Ditambahkan');


        return redirect()->to('/guru/masuk_nilai');
    }
    

    public function nilai_save($id)
    {
        $nilaiModel = new \App\Models\NilaiModel();
        $ekstraModel = new \App\Models\EkstraModel();
        $pastiModel = new \App\Models\PastiModel();
        $pengetahuanModel = new \App\Models\PengetahuanModel();
        $prestasiModel = new \App\Models\PrestasiModel();

        $nilaiModel->save([
            'id' => $id,
            'id_mapel' => $this->request->getVar('id_mapel'),
            'id_tahun_ajaran' => $this->request->getVar('id_tahun_ajaran')
        ]);

        // $data = [
        //     // 'id' => $this->request->getVar('id'),
            
        // ];
        // $nilaiModel->insert($data);
        $nilaiID = $nilaiModel->insertID();
        
        $data1 = [
            'nama_ekstra' => $this->request->getVar('nama_ekstra'),
            'nilai_ekstra' => $this->request->getVar('nilai_ekstra'),
            'catatan' => $this->request->getVar('catatan'),
            'id_nilai' => $nilaiID
        ];
        $ekstraModel->insert($data1);

        $data2 = [
            'nilai_spiritual' => $this->request->getVar('nilai_spiritual'),
            'nilai_sosial' => $this->request->getVar('nilai_sosial'),
            'saran' => $this->request->getVar('saran'),
            'tinggi' => $this->request->getVar('tinggi'),
            'berat' => $this->request->getVar('berat'),
            'saran' => $this->request->getVar('saran'), 
            'pendengaran' => $this->request->getVar('pendengaran'),
            'penglihatan' => $this->request->getVar('penglihatan'),
            'gigi' => $this->request->getVar('gigi'),
            'sakit' => $this->request->getVar('sakit'),
            'izin' => $this->request->getVar('izin'),
            'tanpa_keterangan' => $this->request->getVar('tanpa_keterangan'),
            'id_nilai' => $nilaiID
        ];
        $pastiModel->insert($data2);

        $data3 = [
            'jenis_prestasi' => $this->request->getVar('jenis_prestasi'),
            'keterangan_prestasi' => $this->request->getVar('keterangan_prestasi'),
            'id_nilai' => $nilaiID
        ];
        $prestasiModel->insert($data3);

        // $data4 = [
        //     'pengetahuan_nilai' => $this->request->getVar('pengetahuan_nilai'),
        //     'pengetahuan_predikat' => $this->request->getVar('pengetahuan_predikat'),
        //     'pengetahuan_deskripsi' => $this->request->getVar('pengetahuan_deskripsi'),
        //     'keterampilan_nilai' => $this->request->getVar('keterampilan_nilai'),
        //     'keterampilan_predikat' => $this->request->getVar('keterampilan_predikat'),
        //     'keterampilan_deskripsi' => $this->request->getVar('keterampilan_deskripsi'),
        //     'id_nilai' => $nilaiID
        // ];
        // $pengetahuanModel->insert($data4);

        $arrKet = [
            'nilai' => [1,2,3,4,5,6],    
        ];

        foreach ($arrKet as $arr) {
            $nilai = isset ($arr['nilai']); 

            if(is_array($nilai))
            foreach ($nilai as $index => $n){
                $data4 = array(
                    'pengetahuan_nilai' =>$n['1'],
                    'pengetahuan_predikat' =>$n['2'],
                    'pengetahuan_deskripsi' =>$n['3'],
                    'keterampilan_nilai' =>$n['4'],
                    'keterampilan_predikat' =>$n['5'],
                    'keterampilan_deskripsi' =>$n['6'],
                );

                $pengetahuanModel->insert($data4);
            }
        }


        // $arrKet = [
        //     'pengetahuanNilai' => [1,2,3,4,5,6,7,8,9,10],
        //     'pengetahuanPredikat' => [z,b,c,d,e,f,g,h,i,j],
        //     'pengetahuanDeskripsi' => [k,l,m,n,o,p,q,r,s,t],
        //     'keterampilanNilai' => [11,12,13,14,15,16,17,18,19,20],
        //     'keterampilanPredikat' => [aa,ab,ac,ad,ae,af,ag,ah,ai,aj],
        //     'keterampilanDeskripsi' => [ak,al,am,an,ao,ap,aq,ar,at,au]
        // ];

        // foreach ($arrKet as $arr) {
        //     $pengetahuanNilai = $arr['pengetahuanNilai']; 
        //     $pengetahuanPredikat = $arr['pengetahuanPredikat'];
        //     $keterampilanNilai = $arr['keterampilanNilai']; 
        //     $keterampilanPredikat = $arr['keterampilanPredikat'];
        //     $keterampilanDeskripsi = $arr['keterampilanDeskripsi'];

        //     foreach ($pengetahuanNilai as $index => $n){
        //         $pengetahuanModel->save([
        //             'id_nilai' => $nilaiID,
        //             'pengetahuan_nilai' => $n,
        //             'pengetahuan_predikat' => $pengetahuanPredikat[$index]

        //         ]);
        //     }
        // }
        // $pengetahuanModel->insert($data4);

        // $arrKet = [
        //     "nilai" => [1,2,3,4,5],
        //     "prestasi" => [a,c,d,e,f]
        // ];

        // foreach ($arrKet as $arr){
        //     $nilai = $arr['nilai']; //[1,2,3,4,5]
        //     $prestasi = $arr['prestasi']; //[a,b,c,d,e,f]

        //     foreach ($nilai as $index => $n) {
        //         $nilaiKetrampilanModel->save([
        //             'id_nilai' => $id_nilai,
        //             'keterampilan_nilai' => $n,
        //             'keterampilan_prestasi' => $prestasi[$index],
        //         ]);
        //     }
        // }



        session()->setFlashdata('pesan', 'Data Mata Pelajaran Berhasil Ditambahkan');


        return redirect()->to('/guru/masuk_nilai');
    }

    public function delete_nilai($id_nilai)
    {
        // $NilaiModel = new \App\Models\NilaiModel();
        // $nilai = $NilaiModel->findAll();

        // $nilaiMapelModel = new \App\Models\NilaiMapelModel();
        // $nilaimapel = $nilaiMapelModel->findAll();

        // $ekstraModel = new \App\Models\EkstraModel();
        // $ekstra = $ekstraModel->findAll();

        // $pastiModel = new \App\Models\PastiModel();
        // $pasti = $pastiModel->findAll();

        // $prestasiModel = new \App\Models\PrestasiModel();
        // $prestasi = $prestasiModel->findAll();

        // $kelasModel = new \App\Models\KelasNilaiModel();
        // $kelas = $kelasModel->findAll();

        // $nilaimapel = $nilaiMapelModel->delete($id_nilai);
        // $ekstra = $ekstraModel->delete($id_ekstra);
        // $pasti = $pastiModel->delete($id_nilai_pasti);
        // $prestasi = $prestasiModel->delete($id_nilai);
        // $kelas = $kelasModel->delete($id_nilai);
        // $nilai = $NilaiModel->delete($id_nilai);

        // $db      = \Config\Database::connect();
        // $builder = $db->table('nilai');

        // $builder->select('nilai.id_nilai, nilai.id, nilai.id_tahun_ajaran, 
        //     users.id, users.fullname, users.no_id, 
        //     id_ekstra, nama_ekstra, nilai_ekstra, catatan, nama_ekstra2, nilai_ekstra2, catatan2, nama_ekstra3, nilai_ekstra3, catatan3, nama_ekstra4, nilai_ekstra4, catatan4, nama_ekstra5, nilai_ekstra5, catatan5, nilai_ekstra.id_nilai, 
        //     id_nilai_pasti, nilai_spiritual, nilai_sosial, saran, tinggi, berat, pendengaran, penglihatan, gigi, sakit, izin, tanpa_keterangan, nilai_pasti.id_nilai, 
        //     id_prestasi, jenis_prestasi, keterangan_prestasi, jenis_prestasi2, keterangan_prestasi2, jenis_prestasi3, keterangan_prestasi3, jenis_prestasi4, keterangan_prestasi4, jenis_prestasi5, keterangan_prestasi5, nilai_prestasi.id_nilai, 
        //     id_nilai_mapel, agama_p_nilai, agama_p_predikat, agama_p_deskripsi, agama_k_nilai, agama_k_predikat, agama_k_deskripsi, pancasila_p_nilai, pancasila_p_predikat, pancasila_p_deskripsi, pancasila_k_nilai, pancasila_k_predikat, pancasila_k_deskripsi, indonesia_p_nilai, indonesia_p_predikat, indonesia_p_deskripsi, indonesia_k_nilai, indonesia_k_predikat, indonesia_k_deskripsi, matematika_p_nilai, matematika_p_predikat, matematika_p_deskripsi, matematika_k_nilai, matematika_k_predikat, matematika_k_deskripsi, ipa_p_nilai, ipa_p_predikat, ipa_p_deskripsi, ipa_k_nilai, ipa_k_predikat, ipa_k_deskripsi, ips_p_nilai, ips_p_predikat, ips_p_deskripsi, ips_k_nilai, ips_k_predikat, ips_k_deskripsi, seni_p_nilai, seni_p_predikat, seni_p_deskripsi, seni_k_nilai, seni_k_predikat, seni_k_deskripsi, pjok_p_nilai, pjok_p_predikat, pjok_p_deskripsi, pjok_k_nilai, pjok_k_predikat, pjok_k_deskripsi, jawa_p_nilai, jawa_p_predikat, jawa_p_deskripsi, jawa_k_nilai, jawa_k_predikat, jawa_k_deskripsi, nilai_mapel.id_nilai, 
        //     tahun_ajaran.id_tahun_ajaran, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester, kelas_nilai.id_kelas, kelas_nilai.id_nilai, kelas.id_kelas, kelas.nama_kelas');

        // $builder->join('users', 'users.id = nilai.id');
        // $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');
        // $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id_nilai');
        // $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id_nilai');
        // $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id_nilai');
        // $builder->join('nilai_mapel', 'nilai_mapel.id_nilai = nilai.id_nilai');
        // $builder->join('kelas_nilai', 'kelas_nilai.id_nilai = nilai.id_nilai');
        // $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');

        // $builder->where('nilai.id_nilai', $id_nilai);
        // $builder->delete();

        session()->setFlashdata('pesan', 'Nilai Berhasil Dihapus');
        return redirect()->to('guru/nilai_mapel');
    }

    public function edit_guru()
    {
        $adminModel = new \App\Models\AdminModel();
        $data = [
            'admin' => $adminModel->getAdmin()
        ];
        return view('guru/edit_guru', $data);
    }

    public function guruupdate($id)
    {
        $adminModel = new \App\Models\AdminModel();
        $adminModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'no_id' => $this->request->getVar('no_id'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            // 'pendidikan_sebelumnya' => $this->request->getVar('pendidikan_sebelumnya'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
            // 'nama_ayah' => $this->request->getVar('nama_ayah'),
            // 'nama_ibu' => $this->request->getVar('nama_ibu'),
            // 'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            // 'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            // 'jalan' => $this->request->getVar('jalan'),
            // 'kelurahan' => $this->request->getVar('kelurahan'),
            // 'kecamatan' => $this->request->getVar('kecamatan'),
            // 'kabupaten' => $this->request->getVar('kabupaten'),
            // 'provinsi' => $this->request->getVar('provinsi'),
            // 'nama_wali' => $this->request->getVar('nama_wali'),
            // 'pekerjaan_wali' => $this->request->getVar('pekerjaan_wali'),
            // 'alamat_wali' => $this->request->getVar('alamat_wali'),
            // 'angkatan' => $this->request->getVar('angkatan'),
            // 'user_img' => $this->request->getVar('user_img'),
            // 'password_hash' => $this->request->getVar('password_hash'),
            'jabatan' => $this->request->getVar('jabatan'),
            'golongan' => $this->request->getVar('golongan'),
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Diubah');

        return redirect()->to('/guru/index');
    }
}
