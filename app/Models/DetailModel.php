<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'agama', 'no_id', 'nip', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'pendidikan_sebelumnya', 'alamat', 'no_telp', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'jalan', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'nama_wali', 'pekerjaan_wali', 'alamat_wali', 'angkatan', 'user_img', 'jabatan', 'golongan'];

    public function getGuru($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
