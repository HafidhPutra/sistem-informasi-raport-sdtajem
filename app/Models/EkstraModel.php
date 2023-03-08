<?php

namespace App\Models;

use CodeIgniter\Model;

class EkstraModel extends Model
{
    protected $table      = 'nilai_ekstra';
    protected $primaryKey = 'id_ekstra';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_ekstra', 'nama_ekstra', 'nilai_ekstra', 'catatan', 'nama_ekstra2', 'nilai_ekstra2', 'catatan2', 'nama_ekstra3', 'nilai_ekstra3', 'catatan3', 'nama_ekstra4', 'nilai_ekstra4', 'catatan4', 'nama_ekstra5', 'nilai_ekstra5', 'catatan5', 'id_nilai'];

    public function getEkstra($id_ekstra = false)
    {
        if ($id_nilai_pasti == false) {
            return $this->findAll();
        }

        return $this->where(['id_ekstra' => $id_ekstra])->first();
    }
}
