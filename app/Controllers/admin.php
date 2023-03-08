<?php

namespace App\Controllers;

use PHPExcel;
use PHPExcel_IOFactory;

class Admin extends BaseController
{

    ///////////////////////////////////////////////// INDEX ///////////////////////////////////////////////////////
    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
        $data['title'] = 'User List';
        $db = \Config\Database::connect();
        $builder = $db->table('auth_groups_users');
        $builder->like('group_id', '2');
        $query = $builder->countAllResults();
        $query = $builder->get();

        $data['data'] = $query->getResult();

        return view('admin/profile', $data);
    }

    public function index2()
    {
        return view('admin/index');
    }


    ///////////////////////////////////////////////// GURU ///////////////////////////////////////////////////////
    public function guru()
    {
        $data['title'] = 'User List';
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as user_id, username, fullname, email, agama, alamat, no_telp, user_img, group_id, no_id, jenis_kelamin, tempat_lahir, tanggal_lahir, jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $where = "group_id = '2'";
        $builder->where($where);

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $builder->like('users.fullname', $keyword)->orLike('no_id', $keyword);
        } else {

        }

        $query = $builder->get();

        $data['guru'] = $query->getResult();
        return view('admin/guru', $data);
    }

    public function detailGuru($id)
    {
        $detailModel = new \App\Models\DetailModel();
        // $date = date($this->request->getVar('tahun_angkatan'));
        // $slug = url_title($this->request->getVar('tahun_angkatan'), '-', true);

        $data = [
            'title' => 'Detail',
            'detail' => $detailModel->getGuru($id)
            // 'slug' => $slug

        ];

        // $query = $data->get();
        // $data['detail'] = $query->getResult();
        return view('admin/detail_guru', $data);
    }

    public function tambah_guru()
    {
        return view('admin/tambah_guru');
    }

    public function edit_guru($id)
    {
        $adminModel = new \App\Models\AdminModel();
        $data = [
            'admin' => $adminModel->getAdmin($id)
        ];
        return view('admin/edit_guru', $data);
    }

    public function guruupdate($id)
    {
        $adminModel = new \App\Models\AdminModel();
        $adminModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'no_id' => $this->request->getVar('no_id'),
            'nip' => $this->request->getVar('nip'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'pendidikan_sebelumnya' => $this->request->getVar('pendidikan_sebelumnya'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'jalan' => $this->request->getVar('jalan'),
            'kelurahan' => $this->request->getVar('kelurahan'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kabupaten' => $this->request->getVar('kabupaten'),
            'provinsi' => $this->request->getVar('provinsi'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'pekerjaan_wali' => $this->request->getVar('pekerjaan_wali'),
            'alamat_wali' => $this->request->getVar('alamat_wali'),
            'angkatan' => $this->request->getVar('angkatan'),
            'user_img' => $this->request->getVar('user_img'),
            'password_hash' => $this->request->getVar('password_hash'),
            'jabatan' => $this->request->getVar('jabatan'),
            'golongan' => $this->request->getVar('golongan'),
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Diubah');

        return redirect()->to('/admin/guru');
    }

    ///////////////////////////////////////////////// SISWA ///////////////////////////////////////////////////////
    public function siswa()
    {
        $data['title'] = 'User List';
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, no_id, username, tempat_lahir, tanggal_lahir, jenis_kelamin, users.fullname, email, alamat, no_telp, user_img, group_id');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $where = "group_id = '3'";
        $builder->where($where);

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $builder->like('users.fullname', $keyword)->orLike('no_id', $keyword);
        } else {

        }

        $query = $builder->get();


        $data['siswa'] = $query->getResult();

        // dd($data);
        return view('admin/siswa', $data);
    }

    public function detailSiswa($id)
    {
        $detailModel = new \App\Models\DetailModel();
        // $date = date($this->request->getVar('tahun_angkatan'));
        // $slug = url_title($this->request->getVar('tahun_angkatan'), '-', true);

        $data = [
            'title' => 'Detail',
            'detail' => $detailModel->getGuru($id)
            // 'slug' => $slug

        ];

        // $query = $data->get();
        // $data['detail'] = $query->getResult();
        return view('admin/detail_siswa', $data);
    }

    public function tambah_siswa()
    {
        return view('admin/tambah_siswa');
    }

    public function edit_siswa($id)
    {
        $adminModel = new \App\Models\AdminModel();
        $data = [
            'admin' => $adminModel->getAdmin($id)
        ];
        return view('admin/edit_siswa', $data);
    }

    public function siswaupdate($id)
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
            'pendidikan_sebelumnya' => $this->request->getVar('pendidikan_sebelumnya'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'Pekerjaan_ibu' => $this->request->getVar('Pekerjaan_ibu'),
            'jalan' => $this->request->getVar('jalan'),
            'kelurahan' => $this->request->getVar('kelurahan'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kabupaten' => $this->request->getVar('kabupaten'),
            'provinsi' => $this->request->getVar('provinsi'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'pekerjaan_wali' => $this->request->getVar('pekerjaan_wali'),
            'alamat_wali' => $this->request->getVar('alamat_wali'),
            'angkatan' => $this->request->getVar('angkatan'),
            'user_img' => $this->request->getVar('user_img'),
            'password_hash' => $this->request->getVar('password_hash'),
            'jabatan' => $this->request->getVar('jabatan'),
            'golongan' => $this->request->getVar('golongan'),
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Diubah');

        return redirect()->to('/admin/siswa');
    }

    ///////////////////////////////////////////////// ADMIN ///////////////////////////////////////////////////////
    public function admin()
    {
        // $data['title'] = 'Daftar Admin';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $data['title'] = 'User List';
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as user_id, fullname, username, email, alamat, no_telp, user_img, group_id');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $where = "group_id = '1'";
        $builder->where($where);

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $builder->like('users.fullname', $keyword)->orLike('no_id', $keyword);
        } else {

        }

        $query = $builder->get();

        $data['admin'] = $query->getResult();

        return view('admin/admin', $data);


        // $tambahModel = new \App\Models\TambahModel();
        // $tambah = $tambahModel->findAll();

        // $data_user = $tambahModel->findAll();

        // $data = [
        //     'title' => 'Admin',
        //     "result" => $data_user
        // ]; 


        // $arr = json_decode(json_encode($data), true);
        // $where = "group_id = '1'";
        // $arr->where($where);

        // return view('admin/admin', $data);
    }

    public function detail_admin($id)
    {
        $data['title'] = 'Detail Admin';
        $db = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select('users.id as user_id, fullname, username, email, alamat, no_telp, user_img, group_id');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->where('users.id', $id);

        $query = $builder->get();

        $data['user'] = $query->getRow();
        return view('admin/detail_admin', $data);
    }

    public function tambah_admin()
    {
        return view('admin/tambah_admin');
    }

    public function edit_admin($id)
    {
        $adminModel = new \App\Models\AdminModel();
        $data = [
            'admin' => $adminModel->getAdmin($id)
        ];
        return view('admin/edit_admin', $data);
    }

    public function adminupdate($id)
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
            'pendidikan_sebelumnya' => $this->request->getVar('pendidikan_sebelumnya'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'jalan' => $this->request->getVar('jalan'),
            'kelurahan' => $this->request->getVar('kelurahan'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kabupaten' => $this->request->getVar('kabupaten'),
            'provinsi' => $this->request->getVar('provinsi'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'pekerjaan_wali' => $this->request->getVar('pekerjaan_wali'),
            'alamat_wali' => $this->request->getVar('alamat_wali'),
            'angkatan' => $this->request->getVar('angkatan'),
            'user_img' => $this->request->getVar('user_img'),
            'password_hash' => $this->request->getVar('password_hash'),
            'jabatan' => $this->request->getVar('jabatan'),
            'golongan' => $this->request->getVar('golongan'),
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Diubah');

        return redirect()->to('/admin/admin');
    }

    ///////////////////////////////////////////////// ANGKATAN ///////////////////////////////////////////////////////
    public function angkatan()
    {
        $angkatanModel = new \App\Models\AngkatanModel();
        $angkatan = $angkatanModel->findAll();

        $data = [
            'title' => 'Angkatan',
            'angkatan' => $angkatanModel->getAngkatan()

        ];

        return view('admin/angkatan', $data);
    }

    public function detailAngkatan($slug)
    {
        $angkatanModel = new \App\Models\AngkatanModel();
        $angkatan = $angkatanModel->getAngkatan($slug);
        dd($angkatan);
    }

    public function tambah_angkatan()
    {
        return view('admin/tambah_angkatan');
    }

    public function edit_angkatan($id_angkatan)
    {
        $angkatanModel = new \App\Models\AngkatanModel();
        $data = [
            'angkatan' => $angkatanModel->getAngkatan2($id_angkatan)
        ];
        return view('admin/edit_angkatan', $data);
    }

    public function angkatanupdate($id_angkatan)
    {
        $angkatanModel = new \App\Models\AngkatanModel();
        $slug = url_title($this->request->getVar('tahun_angkatan'), '-', true);
        $angkatanModel->save([
            'id_angkatan' => $id_angkatan,
            'tahun_angkatan' => $this->request->getVar('tahun_angkatan'),
            'jumlah_siswa' => $this->request->getVar('jumlah_siswa'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Diubah');

        return redirect()->to('/admin/angkatan');
    }

    public function angkatanSave()
    {
        $angkatanModel = new \App\Models\AngkatanModel();
        $slug = url_title($this->request->getVar('tahun_angkatan'), '-', true);
        $angkatanModel->save([
            'tahun_angkatan' => $this->request->getVar('tahun_angkatan'),
            'jumlah_siswa' => $this->request->getVar('jumlah_siswa'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Ditambahkan');

        return redirect()->to('/admin/angkatan');
    }

    ///////////////////////////////////////////////// TAHUN AJARAN ///////////////////////////////////////////////////////
    
    public function tahun_ajaran()
    {
        $tahunAjaranModel = new \App\Models\TahunAjaranModel();
        $tahunajaran = $tahunAjaranModel->findAll();

        $data = [
            'title' => 'Tahun Ajaran',
            'tahunajaran' => $tahunAjaranModel->getTahunAjaran()

        ];

        return view('admin/tahun_ajaran', $data);
    }

    public function detailTahunAjaran($slug)
    {
        $tahunAjaranModel = new \App\Models\TahunAjaranModel();
        $tahuunajaran = $tahunAjaranModel->getTahunAjaran($slug);
        dd($tahuunajaran);
    }

    public function tahunajaranSave()
    {
        $tahunAjaranModel = new \App\Models\TahunAjaranModel();
        $slug = url_title($this->request->getVar('tahun_ajaran'), '-', true);
        $tahunAjaranModel->save([
            'tahun_ajaran' => $this->request->getVar('tahun_ajaran'),
            'semester' => $this->request->getVar('semester'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data Mata Pelajaran Berhasil Ditambahkan');

        return redirect()->to('/admin/tahun_ajaran');
    }

    public function tambah_tahun_ajaran()
    {
        return view('admin/tambah_tahun_ajaran');
    }

    public function edit_tahun_ajaran($id_tahun_ajaran)
    {
        $tahunajaranModel = new \App\Models\TahunAjaranModel();
        $data = [
            'tahunajaran' => $tahunajaranModel->getTahunAjaran2($id_tahun_ajaran)
        ];
        return view('admin/edit_tahun_ajaran', $data);
    }

    public function tahunajaranupdate($id_tahun_ajaran)
    {
        $tahunajaranModel = new \App\Models\TahunAjaranModel();
        $slug = url_title($this->request->getVar('tahun_ajaran'), '-', true);
        $tahunajaranModel->save([
            'id_tahun_ajaran' => $id_tahun_ajaran,
            'tahun_ajaran' => $this->request->getVar('tahun_ajaran'),
            'semester' => $this->request->getVar('semester'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Diubah');

        return redirect()->to('/admin/tahun_ajaran');
    }

    ///////////////////////////////////////////////// NILAI ///////////////////////////////////////////////////////
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

        return view('admin/masuk_nilai', $data);
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

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $builder->like('users.fullname', $keyword)->orLike('no_id', $keyword);
        } else {

        }

        $query = $builder->get();
        $data['nilai'] = $query->getResult();;

        // $angkatanModel = new \App\Models\AngkatanModel();
        // $data = [
        //     'angkatan' => $angkatanModel->getAngkatan($id_angkatan),
        //     'nilai' => $angkatanModel->getAll($id_angkatan)
        // ];
         // dd($data);

        return view('admin/nilai', $data);
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

        return view('admin/nilai_mapel', $data);
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

        return view('admin/detail_nilai', $data);
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

        return view('admin/detail_nilai2', $data);
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

        return view('admin/cetak_nilai', $data);
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

        return view('admin/cetak_nilai2', $data);
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

        return view('admin/tambah_nilai', $data);
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

        return view('admin/tambah_nilai2', $data);
    }

    public function tambah_nilai3($id)
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

        return view('admin/tambah_nilai3', $data);
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

        return view('admin/edit_nilai', $data);
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


        return redirect()->to('/admin/masuk_nilai');
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


        return redirect()->to('/admin/masuk_nilai');
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


        return redirect()->to('/admin/masuk_nilai');
    }

    public function delete_nilai($id_nilai)
    {
        $NilaiModel = new \App\Models\NilaiModel();
        $nilai = $NilaiModel->findAll();

        $nilaiMapelModel = new \App\Models\NilaiMapelModel();
        $nilaimapel = $nilaiMapelModel->findAll();

        $ekstraModel = new \App\Models\EkstraModel();
        $ekstra = $ekstraModel->findAll();

        $pastiModel = new \App\Models\PastiModel();
        $pasti = $pastiModel->findAll();

        $prestasiModel = new \App\Models\PrestasiModel();
        $prestasi = $prestasiModel->findAll();

        $kelasModel = new \App\Models\KelasNilaiModel();
        $kelas = $kelasModel->findAll();

        $kelas = $kelasModel->delete('id_nilai', $id_nilai);
        $prestasi = $prestasiModel->delete('id_nilai', $id_nilai);
        $pasti = $pastiModel->delete('id_nilai', $id_nilai);
        $ekstra = $ekstraModel->delete('id_nilai', $id_nilai);
        $nilaimapel = $nilaiMapelModel->delete('id_nilai', $id_nilai);
        $nilai = $NilaiModel->delete('id_nilai', $id_nilai);

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
        return redirect()->to('admin/masuk_nilai');
    }
    

    ///////////////////////////////////////////////// MAPEL ///////////////////////////////////////////////////////
    public function mapel()
    {
        $mapelModel = new \App\Models\MapelModel();
        $mapel = $mapelModel->findAll();

        $data = [
            'title' => 'Mata Pelajaran',
            'mapel' => $mapelModel->getMapel()

        ];

        return view('admin/mapel', $data);
    }

    public function detailMapel($slug)
    {
        $mapelModel = new \App\Models\MapelModel();
        $mapel = $mapelModel->getMapel($slug);
        dd($mapel);
    }

    public function mapelSave()
    {
        $mapelModel = new \App\Models\MapelModel();
        $slug = url_title($this->request->getVar('nama_mapel'), '-', true);
        $mapelModel->save([
            'kode_mapel' => $this->request->getVar('kode_mapel'),
            'kelas' => $this->request->getVar('kelas'),
            'nama_mapel' => $this->request->getVar('nama_mapel'),
            'semester' => $this->request->getVar('semester'),
            'pengampu' => $this->request->getVar('pengampu'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data Mata Pelajaran Berhasil Ditambahkan');

        return redirect()->to('/admin/mapel');
    }

    public function edit_mapel($id_mapel)
    {
        $mapelModel = new \App\Models\MapelModel();
        $data = [
            'mapel' => $mapelModel->getMapel2($id_mapel)
        ];
        return view('admin/edit_mapel', $data);
    }

    public function mapelupdate($id_mapel)
    {
        $mapelModel = new \App\Models\MapelModel();
        $slug = url_title($this->request->getVar('nama_mapel'), '-', true);
        $mapelModel->save([
            'id_mapel' => $id_mapel,
            'kode_mapel' => $this->request->getVar('kode_mapel'),
            'kelas' => $this->request->getVar('kelas'),
            'nama_mapel' => $this->request->getVar('nama_mapel'),
            'semester' => $this->request->getVar('semester'),
            'pengampu' => $this->request->getVar('pengampu'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data Mata Pelajaran Berhasil Diubah');

        return redirect()->to('/admin/mapel');
    }

    public function tambah_mapel()
    {
        return view('admin/tambah_mapel');
    }

    public function delete_admin($id)
    {
        $AdminModel = new \App\Models\AdminModel();
        $admin = $AdminModel->findAll();
        $admin = $AdminModel->delete($id);

        session()->setFlashdata('pesan', 'Data Admin Berhasil Dihapus');
        return redirect()->to('admin/admin');
    }

    public function delete_guru($id)
    {
        $AdminModel = new \App\Models\AdminModel();
        $admin = $AdminModel->findAll();
        $admin = $AdminModel->delete($id);

        session()->setFlashdata('pesan', 'Data Guru Berhasil Dihapus');
        return redirect()->to('admin/guru');
    }

    public function delete_siswa($id)
    {
        $AdminModel = new \App\Models\AdminModel();
        $admin = $AdminModel->findAll();
        $admin = $AdminModel->delete($id);

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Dihapus');
        return redirect()->to('admin/siswa');
    }

    public function delete_mapel($id_mapel)
    {
        $MapelModel = new \App\Models\MapelModel();
        $mapel = $MapelModel->findAll();
        $mapel = $MapelModel->delete($id_mapel);

        session()->setFlashdata('pesan', 'Data Mata Pelajaran Berhasil Dihapus');
        return redirect()->to('admin/mapel');
    }

    public function delete_angkatan($id_angkatan)
    {
        $AngkatanModel = new \App\Models\AngkatanModel();
        $angkatan = $AngkatanModel->findAll();
        $angkatan = $AngkatanModel->delete($id_angkatan);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Dihapus');
        return redirect()->to('admin/angkatan');
    }

    public function delete_tahunajaran($id_tahun_ajaran)
    {
        $TahunAjaranModel = new \App\Models\TahunAjaranModel();
        $tahunajaran = $TahunAjaranModel->findAll();
        $tahunajaran = $TahunAjaranModel->delete($id_tahun_ajaran);

        session()->setFlashdata('pesan', 'Data Tahun Ajaran Berhasil Dihapus');
        return redirect()->to('admin/tahun_ajaran');
    }

    public function angkatan_siswa()
    {
        // $pengaturanModel = new \App\Models\PengaturanModel();
        // $data['users'] = $pengaturanModel->getAll();
        // $angkatanModel = new \App\Models\AngkatanModel();
        

        $db      = \Config\Database::connect();
        $builder = $db->table('angkatan');
        $builder->select('angkatan.id_angkatan, angkatan.tahun_angkatan');

        // $builder->join('user_angkatan', 'user_angkatan.id_angkatan = angkatan.id_angkatan', 'left');
        // $builder->join('users', 'users.id = user_angkatan.id_siswa', 'inner');
        // $where = "user_angkatan.id_user_angkatan <> ";
        // $builder->where($where);
        // $builder->getWhere(['users.id' => 'user_angkatan.id_siswa']);


        $query = $builder->get();
        // $data = [
        //     'angkatan' => $angkatanModel->getAll()
        // ];
        $data['nilai'] = $query->getResult();


        // dd($data);

        return view('admin/angkatan_siswa', $data);
    }

    public function tambah_angkatan_siswa()
    {
        // $pengaturanModel = new \App\Models\PengaturanModel();
        // $data['users'] = $pengaturanModel->getAll();

        $angkatanModel = new \App\Models\AngkatanModel();
        

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.username, users.fullname, auth_groups_users.user_id, auth_groups_users.group_id');

        // $builder->join('user_angkatan', 'user_angkatan.id_siswa = users.id');
        // $builder->join('angkatan', 'angkatan.id_angkatan = user_angkatan.id_angkatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.user_id');

        $where = "group_id = '3'";
        $builder->where($where);
        // $builder->where('users.id', 2);

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $builder->like('users.fullname', $keyword)->orLike('no_id', $keyword);
        } else {

        }
        
        $query = $builder->get();
        $data = [
            'angkatan' => $angkatanModel->getAll()
        ];
        $data['nilai'] = $query->getResult();


        // dd($data);

        return view('admin/tambah_angkatan_siswa', $data);
    }

    public function edit_angkatan_siswa($id)
    {
        // $pengaturanModel = new \App\Models\PengaturanModel();
        $groupsModel = new \App\Models\GroupsModel();
        $angkatanModel = new \App\Models\AngkatanModel();
        $userModel = new \App\Models\UserAngkatanModel();
        // $data = [
        //     'users' => $pengaturanModel->getAdmin($id),
        //     'role' => $groupsModel->getGroups()
        // ];
        // // dd($data);

        // // $data['users'] = $pengaturanModel->getAdmin($id);


        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.username, users.password_hash, 
            auth_groups_users.group_id, auth_groups_users.user_id, 
            auth_groups.id as id_group, auth_groups.name');

        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.user_id');

        // $where = "id = '$id_angkatan'";
        $builder->where('users.id', $id);
        $query = $builder->get();
        $data = [
            'angkatan' => $angkatanModel->getAngkatan(),
            'user' => $userModel->getUserAngkatan()
        ];
        $data['nilai'] = $query->getResult();
        // $data['role'] = $groupsModel->findAll();

        // dd($data);

        return view('admin/edit_angkatan_siswa', $data);
    }

    public function update_user_angkatan($id_user_angkatan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user_angkatan');
        $builder->select('user_angkatan.id_siswa, user_angkatan.id_angkatan, user_angkatan.id_user_angkatan');

        // $where = "id = '$id_angkatan'";
        $builder->where('user_angkatan.id_user_angkatan', $id_user_angkatan);
        $query = $builder->get();
        $data['nilai'] = $query->getResult();
        // $data['role'] = $groupsModel->findAll();

        // dd($data);

        return view('admin/update_user_angkatan', $data);
    }

    public function editangkatanupdate($id)
    {
        $userModel = new \App\Models\UserAngkatanModel();

        $userModel->save([
            'id_siswa' => $id,
            'id_angkatan' => $this->request->getVar('id_angkatan'),
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Diubah');

        return redirect()->to('/admin/angkatan_siswa');
    }

    public function editangkatanupdate2($id_user_angkatan)
    {
        $userModel = new \App\Models\UserAngkatanModel();

        $userModel->save([
            'id_user_angkatan' => $id_user_angkatan,
            'id_siswa' => $this->request->getVar('id_siswa'),
            'id_angkatan' => $this->request->getVar('id_angkatan'),
        ]);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Diubah');

        return redirect()->to('/admin/angkatan_siswa');
    }

    public function delete_user_angkatan($id_user_angkatan)
    {
        $AngkatanModel = new \App\Models\UserAngkatanModel();
        $angkatan = $AngkatanModel->findAll();
        $angkatan = $AngkatanModel->delete($id_user_angkatan);

        session()->setFlashdata('pesan', 'Data Angkatan Berhasil Dihapus');
        return redirect()->to('admin/angkatan_siswa');
    }

    public function pengaturan()
    {
        $pengaturanModel = new \App\Models\PengaturanModel();
        

        // // d($this->request->getVar('keyword'));

        
        // $data['users'] = $pengaturanModel->getAll();

        // $keyword = $this->request->getVar('keyword');
        // if ($keyword) {
        //     $users = $pengaturanModel->search($keyword);
        // } else {
        //     $users = $pengaturanModel;
        // }

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.username, users.fullname, users.no_id, users.password_hash, 
            auth_groups_users.group_id, auth_groups_users.user_id, 
            auth_groups.id as id_group, auth_groups.name');

        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.user_id');

        // $where = "id = '$id_angkatan'";
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $builder->like('users.fullname', $keyword)->orLike('no_id', $keyword);
        } else {

        }

        $query = $builder->get();
        $data['users'] = $query->getResult();


        // dd($data);

        return view('admin/pengaturan', $data);
    }

    // public function auth_groups_users()
    // {
    //     $groupsModel = new \App\Models\GroupsModel();
    //     $data1 = $groupsModel->getAll();
    //     return view('admin/edit_user', $data1);
    // }

    public function edit_user($id)
    {
        // $pengaturanModel = new \App\Models\PengaturanModel();
        $groupsModel = new \App\Models\GroupsModel();
        // $data = [
        //     'users' => $pengaturanModel->getAdmin($id),
        //     'role' => $groupsModel->getGroups()
        // ];
        // // dd($data);

        // // $data['users'] = $pengaturanModel->getAdmin($id);


        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.username, users.fullname, users.password_hash, 
            auth_groups_users.group_id, auth_groups_users.user_id, 
            auth_groups.id as id_group, auth_groups.name');

        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.user_id');

        // $where = "id = '$id_angkatan'";
        $builder->where('users.id', $id);
        $query = $builder->get();
        $data['nilai'] = $query->getResult();
        // $data['role'] = $groupsModel->findAll();

        // dd($data);

        return view('admin/edit_user', $data);
    }

    public function userupdate($id)
    {
        $pengaturanModel = new \App\Models\PengaturanModel();
        $adminModel = new \App\Models\AdminModel();
        $groupsModel = new \App\Models\GroupsModel();
        $authModel = new \App\Models\AuthGroupsModel();
        
        // $data0 = [
        //     'id' => $id,
        //     'username' => $this->request->getVar('username'),
        // ];
        // $adminModel->replace($data0);
        
        // $data1 = [
        //     'group_id' => $group_id,
        //     'user_id' => $this->request->getVar('user_id'),
        // ];
        // $authModel->replace($data1);

        $authModel->set([
            'user_id' => $this->request->getVar('user_id'),
            'group_id' => $this->request->getVar('group_id'),
        ]); 
        $authModel->where('user_id', $id);
        $authModel->update();

        session()->setFlashdata('pesan', 'Tingkatan Pengguna Berhasil Diubah');

        return redirect()->to('/admin/pengaturan');
    }

    public function detail_angkatan($id_angkatan)
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

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $builder->like('users.fullname', $keyword)->orLike('no_id', $keyword);
        } else {

        }

        $query = $builder->get();
        $data['nilai'] = $query->getResult();;

        // $angkatanModel = new \App\Models\AngkatanModel();
        // $data = [
        //     'angkatan' => $angkatanModel->getAngkatan($id_angkatan),
        //     'nilai' => $angkatanModel->getAll($id_angkatan)
        // ];
         // dd($data);

        return view('admin/detail_angkatan', $data);
    }

    public function kelas()
    {
        // $kelasModel = new \App\Models\KelasModel();
        // $kelas = $kelasModel->findAll();

        // $data = [
        //     'kelas' => $kelasModel->getKelas()

        // ];

        $db = \Config\Database::connect();
        $builder = $db->table('kelas_guru');
        $builder->select('kelas_guru.id_kelas_guru, kelas_guru.id_guru, kelas_guru.id_kelas, users.id, users.fullname, users.nip, kelas.id_kelas, kelas.nama_kelas');
        $builder->join('users', 'users.id = kelas_guru.id_guru');
        $builder->join('kelas', 'kelas.id_kelas = kelas_guru.id_kelas');

        $query = $builder->get();
        $data['guru'] = $query->getResult();

        // dd($data);

        return view('admin/kelas', $data);
    }

    public function tambah_kelas()
    {
        // $adminModel = new \App\Models\AdminModel();
        // $data = [
        //     'guru' => $adminModel->getGuru()
        // ];
        $kelasModel = new \App\Models\KelasModel();
        $kelas = $kelasModel->findAll();
        $data = [
            'kelas' => $kelasModel->getKelas()

        ];

        $data['title'] = 'User List';
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as user_id, username, fullname, email, agama, alamat, no_telp, user_img, group_id, no_id, jenis_kelamin, tempat_lahir, tanggal_lahir, jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $where = "group_id = '2'";
        $builder->where($where);

        $query = $builder->get();

        $data['guru'] = $query->getResult();
        

        return view('admin/tambah_kelas', $data);
    }

    public function edit_kelas($id_kelas_guru)
    {
        // $adminModel = new \App\Models\AdminModel();
        // $kelasModel = new \App\Models\KelasModel();
        // $data = [
        //     'guru' => $adminModel->getGuru($id_kelas),
        //     'kelas' => $kelasModel->getKelas($id_kelas)
        // ];

        $kelasModel = new \App\Models\KelasModel();
        $kelas = $kelasModel->findAll();
        $kelasGuruModel = new \App\Models\KelasGuruModel();
        $kelasGuru = $kelasGuruModel->findAll();
        $data = [
            'kelas' => $kelasModel->getKelas(),
            'kelasGuru' => $kelasGuruModel->getKelasGuru($id_kelas_guru)
        ];

        $data['title'] = 'User List';
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as user_id, username, nip, fullname, email, agama, alamat, no_telp, user_img, group_id, no_id, jenis_kelamin, tempat_lahir, tanggal_lahir, jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $where = "group_id = '2'";
        $builder->where($where);

        $query = $builder->get();

        $data['guru'] = $query->getResult();

        // dd($data);

        return view('admin/edit_kelas', $data);
    }

    public function kelasupdate($id_kelas_guru)
    {
        $kelasGuruModel = new \App\Models\KelasGuruModel();
        $data = [
            'id_kelas_guru' => $this->request->getVar('id_kelas_guru'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'id_guru' => $this->request->getVar('id_guru')
        ];
        $kelasGuruModel->replace($data);

        session()->setFlashdata('pesan', 'Data Kelas Berhasil Diubah');

        return redirect()->to('/admin/kelas');
    }

    public function kelasSave()
    {
        $kelasGuruModel = new \App\Models\KelasGuruModel();
        $kelasGuruModel->save([
            'id_kelas' => $this->request->getVar('id_kelas'),
            'id_guru' => $this->request->getVar('id_guru')
        ]);

        session()->setFlashdata('pesan', 'Data Kelas Berhasil Ditambahkan');

        return redirect()->to('/admin/kelas');
    }

    public function delete_kelas($id_kelas_guru)
    {
        $kelasGuruModel = new \App\Models\KelasGuruModel();
        $kelasGuru = $kelasGuruModel->findAll();
        $kelasGuru = $kelasGuruModel->delete($id_kelas_guru);

        session()->setFlashdata('pesan', 'Data Kelas Berhasil Dihapus');
        return redirect()->to('admin/kelas');
    }

    public function import_siswa()
    {
        return view('admin/import_siswa');;
    }

     public function proses_import_siswa()
    {
        $adminModel = new \App\Models\AdminModel();
        $authGroupsModel = new \App\Models\AuthGroupsModel();

        $file = $this->request->getFile('file_excel');

        new PHPExcel;
        $fileLocation = $file->getTempName();
        //baca file excel
        $objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
        //ambil sheet aktif
        $sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

        //melakukan perulangan baris data
        foreach ($sheet as $key => $data) {
            //skip baris 1
            if ($key ==1) {
                continue;
            }
            //skip jika ada data yang sama
            // $no_id = $admin = $adminModel->cek_data($data['B']);
            // if ($data['B']==$no_id['no_id']) {
            //     continue;
            // }

            // $group_id = $group = $authGroupsModel->cek_data($data['AC']);
            // if ($data['AC']==$group_id['group_id']) {
            //     continue;
            // }

            $data = array(
                'fullname' => $data['B'],
                'no_id' => $data['C'],
                'tempat_lahir' => $data['D'],
                'tanggal_lahir' => $data['E'],
                'jenis_kelamin' => $data['F'],
                'agama' => $data['G'],
                'pendidikan_sebelumnya' => $data['H'],
                'alamat' => $data['I'],
                'no_telp' => $data['J'],
                'nama_ayah' => $data['K'],
                'nama_ibu' => $data['L'],
                'pekerjaan_ayah' => $data['M'],
                'Pekerjaan_ibu' => $data['N'],
                'jalan' => $data['O'],
                'kelurahan' => $data['P'],
                'kecamatan' => $data['Q'],
                'kabupaten' => $data['R'],
                'provinsi' => $data['S'],
                'nama_wali' => $data['T'],
                'pekerjaan_wali' => $data['U'],
                'alamat_wali' => $data['V'],
                'angkatan' => $data['W'],
                'jabatan' => $data['X'],
                'golongan' => $data['Y'],
                'email' => $data['Z'],
                'username' => $data['AA'],
                'password_hash' => $data['AB'],
            );
            $admin = $adminModel->add($data);

            $userID = $adminModel->insertID();

            // $data2 = array(
            //     'group_id' => $data['AC'],
            //     'user_id' => $userID
            // );
            // $group = $authGroupsModel->add($data2);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('admin/siswa');
    }

    public function import_guru()
    {
        return view('admin/import_guru');;
    }

     public function proses_import_guru()
    {
        $adminModel = new \App\Models\AdminModel();

        $file = $this->request->getFile('file_excel');

        new PHPExcel;
        $fileLocation = $file->getTempName();
        //baca file excel
        $objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
        //ambil sheet aktif
        $sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

        //melakukan perulangan baris data
        foreach ($sheet as $key => $data) {
            //skip baris 1
            if ($key ==1) {
                continue;
            }
            //skip jika ada data yang sama
            $no_id = $admin = $adminModel->cek_data($data['B']);
            if ($data['C']==$no_id['no_id']) {
                continue;
            }

            $data = array(
                'fullname' => $data['B'],
                'no_id' => $data['C'],
                'tempat_lahir' => $data['D'],
                'tanggal_lahir' => $data['E'],
                'jenis_kelamin' => $data['F'],
                'agama' => $data['G'],
                'pendidikan_sebelumnya' => $data['H'],
                'alamat' => $data['I'],
                'no_telp' => $data['J'],
                'nama_ayah' => $data['K'],
                'nama_ibu' => $data['L'],
                'pekerjaan_ayah' => $data['M'],
                'Pekerjaan_ibu' => $data['N'],
                'jalan' => $data['O'],
                'kelurahan' => $data['P'],
                'kecamatan' => $data['Q'],
                'kabupaten' => $data['R'],
                'provinsi' => $data['S'],
                'nama_wali' => $data['T'],
                'pekerjaan_wali' => $data['U'],
                'alamat_wali' => $data['V'],
                'angkatan' => $data['W'],
                'password_hash' => $data['X'],
                'jabatan' => $data['Y'],
                'golongan' => $data['Z'],
            );
            $admin = $adminModel->add($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('admin/guru');
    }

    public function import_nilai()
    {
        return view('admin/import_nilai');;
    }

     public function proses_import_nilai()
    {
        $adminModel = new \App\Models\AdminModel();

        $file = $this->request->getFile('file_excel');

        new PHPExcel;
        $fileLocation = $file->getTempName();
        //baca file excel
        $objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
        //ambil sheet aktif
        $sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

        //melakukan perulangan baris data
        foreach ($sheet as $key => $data) {
            //skip baris 1
            if ($key ==1) {
                continue;
            }
            //skip jika ada data yang sama
            $no_id = $admin = $adminModel->cek_data($data['B']);
            if ($data['C']==$no_id['no_id']) {
                continue;
            }

            $data = array(
                'id' => $id,
                'fullname' => $data['A'],
                'id_tahun_ajaran' => $data['B'],
                'id_kelas' => $data['C'],

                'nilai_spiritual' => $data['D'],
                'nilai_sosial' => $data['E'],
                
                'agama_p_nilai' => $data['F'],
                'agama_p_predikat' => $data['G'],
                'agama_p_deskripsi' => $data['H'],
                'agama_k_nilai' => $data['I'],
                'agama_k_predikat' => $data['J'],
                'agama_k_deskripsi' => $data['K'],

                'pancasila_p_nilai' => $data['L'],
                'pancasila_p_predikat' => $data['M'],
                'pancasila_p_deskripsi' => $data['N'],
                'pancasila_k_nilai' => $data['O'],
                'pancasila_k_predikat' => $data['P'],
                'pancasila_k_deskripsi' => $data['Q'],

                'indonesia_p_nilai' => $data['R'],
                'indonesia_p_predikat' => $data['S'],
                'indonesia_p_deskripsi' => $data['T'],
                'indonesia_k_nilai' => $data['U'],
                'indonesia_k_predikat' => $data['V'],
                'indonesia_k_deskripsi' => $data['W'],


                'matematika_p_nilai' => $data['X'],
                'matematika_p_predikat' => $data['Y'],
                'matematika_p_deskripsi' => $data['Z'],
                'matematika_k_nilai' => $data['AB'],
                'matematika_k_predikat' => $data['AC'],
                'matematika_k_deskripsi' => $data['AD'],

                'ipa_p_nilai' => $data['AE'],
                'ipa_p_predikat' => $data['AF'],
                'ipa_p_deskripsi' => $data['AG'],
                'ipa_k_nilai' => $data['AH'],
                'ipa_k_predikat' => $data['AI'],
                'ipa_k_deskripsi' => $data['AJ'],


                'ips_p_nilai' => $data['AK'],
                'ips_p_predikat' => $data['AL'],
                'ips_p_deskripsi' => $data['AM'],
                'ips_k_nilai' => $data['AN'],
                'ips_k_predikat' => $data['AO'],
                'ips_k_deskripsi' => $data['AP'],

                'seni_p_nilai' => $data['AQ'],
                'seni_p_predikat' => $data['AR'],
                'seni_p_deskripsi' => $data['AS'],
                'seni_k_nilai' => $data['AT'],
                'seni_k_predikat' => $data['AU'],
                'seni_k_deskripsi' => $data['AV'],

                'pjok_p_nilai' => $data['AW'],
                'pjok_p_predikat' => $data['AX'],
                'pjok_p_deskripsi' => $data['AY'],
                'pjok_k_nilai' => $data['AZ'],
                'pjok_k_predikat' => $data['BA'],
                'pjok_k_deskripsi' => $data['BC'],

                'jawa_p_nilai' => $data['BD'],
                'jawa_p_predikat' => $data['BE'],
                'jawa_p_deskripsi' => $data['BF'],
                'jawa_k_nilai' => $data['BG'],
                'jawa_k_predikat' => $data['BH'],
                'jawa_k_deskripsi' => $data['BI'],
                
                'id_ekstra' => $data['BJ'],
                'nama_ekstra' => $data['BK'],
                'nilai_ekstra' => $data['BL'],
                'catatan' => $data['BM'],

                'nama_ekstra2' => $data['BN'],
                'nilai_ekstra2' => $data['BO'],
                'catatan2' => $data['BP'],

                'nama_ekstra3' => $data['BQ'],
                'nilai_ekstra3' => $data['BR'],
                'catatan3' => $data['BS'],

                'nama_ekstra4' => $data['BT'],
                'nilai_ekstra4' => $data['BU'],
                'catatan4' => $data['BV'],

                'nama_ekstra5' => $data['BW'],
                'nilai_ekstra5' => $data['BX'],
                'catatan5' => $data['BW'],
                
                'saran' => $data['BZ'],

                'tinggi' => $data['CA'],
                'berat' => $data['CB'],
                 
                'pendengaran' => $data['CC'],
                'penglihatan' => $data['CD'],
                'gigi' => $data['CE'],

                'jenis_prestasi' => $data['CF'],
                'keterangan_prestasi' => $data['CG'],

                'jenis_prestasi2' => $data['CH'],
                'keterangan_prestasi2' => $data['CI'],

                'jenis_prestasi3' => $data['CJ'],
                'keterangan_prestasi3' => $data['CK'],

                'jenis_prestasi4' => $data['CL'],
                'keterangan_prestasi4' => $data['CM'],

                'jenis_prestasi5' => $data['CN'],
                'keterangan_prestasi5' => $data['CO'],

                'sakit' => $data['CP'],
                'izin' => $data['CQ'],
                'tanpa_keterangan' => $data['CR'],
                
            );
            $admin = $adminModel->add($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('admin/masuk_nilai');
    }



//simpen nilai

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
    
}
