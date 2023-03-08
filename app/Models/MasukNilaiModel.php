<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukNilaiModel extends Model
{
    protected $table      = 'user_angkatan';
    protected $primaryKey = 'id_angkatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_angkatan', 'id_siswa'];

    public function getNilai($id_angkatan = false)
    {
        if ($id_angkatan == false) {
            return $this->findAll();
        }

        return $this->where(['id_angkatan' => $id_angkatan])->first();
    }

    function getAll()
    {
        $builder = $this->db->table('user_angkatan');
        $builder->join('angkatan', 'angkatan.id_angkatan = user_angkatan.id_angkatan', 'INNER');
        $builder->join('users', 'users.id = angkatan.id_angkatan', 'INNER');
        // $where = "id_angkatan = '$id_angkatan'";
        // $builder->where($where);

        $query = $builder->get();
        return $query->getResult();
    }
}
