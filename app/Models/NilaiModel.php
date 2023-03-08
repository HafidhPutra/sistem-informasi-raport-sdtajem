<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table      = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_nilai', 'id', 'id_tahun_ajaran'];

    public function getNilai($id_nilai = false)
    {
        if ($id_nilai == false) {
            return $this->findAll();
        }

        return $this->where(['id_nilai' => $id_nilai])->first();
    }
}
