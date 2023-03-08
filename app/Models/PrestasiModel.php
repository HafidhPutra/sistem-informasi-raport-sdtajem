<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table      = 'nilai_prestasi';
    protected $primaryKey = 'id_prestasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_prestasi', 'jenis_prestasi', 'keterangan_prestasi',  'jenis_prestasi2', 'keterangan_prestasi2', 'jenis_prestasi3', 'keterangan_prestasi3', 'jenis_prestasi4', 'keterangan_prestasi4', 'jenis_prestasi5', 'keterangan_prestasi5', 'id_nilai'];

    public function getPrestasi($id_prestasi = false)
    {
        if ($id_prestasi == false) {
            return $this->findAll();
        }

        return $this->where(['id_prestasi' => $id_prestasi])->first();
    }
}
