<?php

namespace App\Models;

use CodeIgniter\Model;

class PengetahuanModel extends Model
{
    protected $table      = 'nilai_pengetahuan';
    protected $primaryKey = 'id_nilai_pengetahuan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_nilai_pengetahuan', 'pengetahuan_nilai', 'pengetahuan_predikat', 'pengetahuan_deskripsi', 'keterampilan_nilai', 'keterampilan_predikat', 'keterampilan_deskripsi', 'id_nilai'];

    public function getGuru($id_nilai_pengetahuan = false)
    {
        if ($id_nilai_pengetahuan == false) {
            return $this->findAll();
        }

        return $this->where(['id_nilai_pengetahuan' => $id_nilai_pengetahuan])->first();
    }
}
