<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table      = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kelas', 'nama_kelas', 'wali_kelas', 'id_wali_kelas'];

    public function getKelas($id_kelas = false)
    {
        if ($id_kelas == false) {
            return $this->findAll();
        }

        return $this->where(['id_kelas' => $id_kelas])->first();
    }
}
