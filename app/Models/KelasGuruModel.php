<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasGuruModel extends Model
{
    protected $table      = 'kelas_guru';
    protected $primaryKey = 'id_kelas_guru';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kelas_guru', 'id_kelas', 'id_guru'];

    public function getKelasGuru($id_kelas_guru = false)
    {
        if ($id_kelas_guru == false) {
            return $this->findAll();
        }

        return $this->where(['id_kelas_guru' => $id_kelas_guru])->first();
    }
}
