<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailNilaiModel extends Model
{
    protected $table      = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_nilai', 'id', 'id_tahun_ajaran'];

    public function getDetailNilai($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    function getAll($id_nilai)
    {
        $builder = $this->db->table('nilai');
        $builder->join('users', 'users.id = nilai.id');
        $builder->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = nilai.id_tahun_ajaran');


        $builder->join('nilai_ekstra', 'nilai_ekstra.id_nilai = nilai.id');
        $builder->join('nilai_pasti', 'nilai_pasti.id_nilai = nilai.id');
        $builder->join('nilai_pengetahuan', 'nilai_pengetahuan.id_nilai = nilai.id');
        $builder->join('nilai_prestasi', 'nilai_prestasi.id_nilai = nilai.id');

        $builder->where('nilai.id', '$users.id');

        $query = $builder->get();
        return $query->getResult();
    }
}
