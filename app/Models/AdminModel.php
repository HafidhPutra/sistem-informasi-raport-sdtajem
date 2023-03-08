<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'no_id', 'nip', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'pendidikan_sebelumnya', 'alamat', 'no_telp', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'Pekerjaan_ibu', 'jalan', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'nama_wali', 'pekerjaan_wali', 'alamat_wali', 'angkatan', 'user_img', 'password_hash', 'jabatan', 'golongan'];

    public function getAdmin($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getGuru()
    {
        $builder = $this->db->table('users');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $where = "group_id = '2'";
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    function getAll()
    {
        $builder = $this->db->table('users');
        $builder->select('id');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();
        return $query->getResult();
    }

    public function cek_data($no_id)
    {
        return $this->db->table('users')
            ->where('no_id', $no_id)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('users')->insert($data);
    }
}
