<?php

namespace App\Models;

use CodeIgniter\Model;

class AngkatanModel extends Model
{
    protected $table      = 'angkatan';
    protected $primaryKey = 'id_angkatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['tahun_angkatan', 'slug'];

    public function getAngkatan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getAngkatan2($id_angkatan = false)
    {
        if ($id_angkatan == false) {
            return $this->findAll();
        }

        return $this->where(['id_angkatan' => $id_angkatan])->first();
    }

    function getAll()
    {
        $builder = $this->db->table('angkatan');
        $builder->join('user_angkatan', 'user_angkatan.id_angkatan = angkatan.id_angkatan');
        $builder->join('users', 'users.id = user_angkatan.id_siswa');
        // $where = "id_angkatan = '$id_angkatan'";
        // $builder->where($where);

        $query = $builder->get();
        return $query->getResult();
    }
}
