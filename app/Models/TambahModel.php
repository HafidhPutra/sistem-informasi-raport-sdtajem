<?php

namespace App\Models;

use CodeIgniter\Model;

class TambahModel extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'no_id', 'tempat_lahir', 'nip', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'pendidikan_sebelumnya', 'alamat', 'no_telp', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'jalan', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'nama_wali', 'pekerjaan_wali', 'alamat_wali', 'angkatan', 'user_img', 'username', 'email', 'password_hash', 'jabatan', 'golongan'];

    public function getUsers()
    {
        return $this->select('fullname, no_id, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, pendidikan_sebelumnya, alamat, no_telp, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, jalan, kelurahan, kecamatan, kabupaten, provinsi,nama_wali, pekerjaan_wali, alamat_wali, angkatan, user_img, username, email , password_hash, gs.group_id, g.name group_name')
            ->join('auth_groups_users gs', 'users.id=gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')
            ->findAll();
    }
}
