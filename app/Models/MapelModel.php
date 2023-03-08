<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table      = 'mapel';
    protected $primaryKey = 'id_mapel';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_mapel', 'kelas', 'nama_mapel', 'slug', 'semester', 'pengampu'];

    public function getMapel($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getMapel2($id_mapel)
    {
        if ($id_mapel == false) {
            return $this->findAll();
        }

        return $this->where(['id_mapel' => $id_mapel])->first();
    }
}
