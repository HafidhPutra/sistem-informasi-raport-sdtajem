<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunAjaranModel extends Model
{
    protected $table      = 'tahun_ajaran';
    protected $primaryKey = 'id_tahun_ajaran';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_tahun_ajaran', 'tahun_ajaran', 'semester', 'slug'];

    public function getTahunAjaran($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getTahunAjaran2($id_tahun_ajaran = false)
    {
        if ($id_tahun_ajaran == false) {
            return $this->findAll();
        }

        return $this->where(['id_tahun_ajaran' => $id_tahun_ajaran])->first();
    }
}
