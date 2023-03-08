<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'username', 'no_id', 'nip', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'pendidikan_sebelumnya', 'alamat', 'no_telp', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'Pekerjaan_ibu', 'jalan', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'nama_wali', 'pekerjaan_wali', 'alamat_wali', 'angkatan', 'user_img', 'jabatan', 'golongan'];

    public function getAdmin($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    function getAll()
    {
        $builder = $this->db->table('users');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();
        return $query->getResult();
    }

    public function search($keyword)
    {
        // $builder = $this->db->table('users');
        // $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $builder->like('fullname', $keyword);
        // $builder->orLike('username', $keyword);
        // $builder->orLike('group_id', $keyword);
        // $query = $builder->get();
        // return $query->getResult();
        $builder = $this->table('users');
        $builder->like('fullname', $keyword);
        return $builder;
        // return $this->table('users')->like('fullname', $keyword)->orLike('username', $keyword);
    }
}
