<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAngkatanModel extends Model
{
    protected $table      = 'user_angkatan';
    protected $primaryKey = 'id_user_angkatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user_angkatan','id_angkatan', 'id_siswa'];

    public function getUserAngkatan($id_user_angkatan = false)
    {
        if ($id_user_angkatan == false) {
            return $this->findAll();
        }

        return $this->where(['id_user_angkatan' => $id_user_angkatan])->first();
    }
}
