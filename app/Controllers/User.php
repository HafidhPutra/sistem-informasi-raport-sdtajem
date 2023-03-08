<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        return view('user/index');
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

        return view('user/nilai_mapel', $data);
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

        return view('user/detail_nilai', $data);
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

        return view('user/detail_nilai2', $data);
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

        return view('user/cetak_nilai', $data);
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

        return view('user/cetak_nilai2', $data);
    }
}
