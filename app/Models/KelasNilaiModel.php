<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasNilaiModel extends Model
{
    protected $table      = 'kelas_nilai';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kelas', 'id_nilai'];

    public function getKelas($id_kelas = false)
    {
        if ($id_kelas == false) {
            return $this->findAll();
        }

        return $this->where(['id_kelas' => $id_kelas])->first();
    }
    function getAll()
    {
        $builder = $this->db->table('kelas_nilai');
        $builder->join('kelas', 'kelas.id_kelas = kelas_nilai.id_kelas');
        $query = $builder->get();
        return $query->getResult();
    }
}
