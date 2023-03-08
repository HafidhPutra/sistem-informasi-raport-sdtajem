<?php

namespace App\Models;

use CodeIgniter\Model;

class PastiModel extends Model
{
    protected $table      = 'nilai_pasti';
    protected $primaryKey = 'id_nilai_pasti';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_nilai_pasti', 'nilai_spiritual', 'nilai_sosial', 'saran', 'tinggi', 'berat', 'pendengaran', 'penglihatan', 'gigi', 'sakit', 'izin', 'tanpa_keterangan', 'id_nilai'];

    public function getPasti($id_nilai_pasti = false)
    {
        if ($id_nilai_pasti == false) {
            return $this->findAll();
        }

        return $this->where(['id_nilai_pasti' => $id_nilai_pasti])->first();
    }
}
