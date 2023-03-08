<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiMapelModel extends Model
{
    protected $table      = 'nilai_mapel';
    protected $primaryKey = 'id_nilai_mapel';
    protected $useTimestamps = true;
    protected $allowedFields = [ 'id_nilai_mapel', 'agama_p_nilai', 'agama_p_predikat', 'agama_p_deskripsi', 'agama_k_nilai', 'agama_k_predikat', 'agama_k_deskripsi', 'pancasila_p_nilai', 'pancasila_p_predikat', 'pancasila_p_deskripsi', 'pancasila_k_nilai', 'pancasila_k_predikat', 'pancasila_k_deskripsi', 'indonesia_p_nilai', 'indonesia_p_predikat', 'indonesia_p_deskripsi', 'indonesia_k_nilai', 'indonesia_k_predikat', 'indonesia_k_deskripsi', 'matematika_p_nilai', 'matematika_p_predikat', 'matematika_p_deskripsi', 'matematika_k_nilai', 'matematika_k_predikat', 'matematika_k_deskripsi', 'ipa_p_nilai', 'ipa_p_predikat', 'ipa_p_deskripsi', 'ipa_k_nilai', 'ipa_k_predikat', 'ipa_k_deskripsi', 'ips_p_nilai', 'ips_p_predikat', 'ips_p_deskripsi', 'ips_k_nilai', 'ips_k_predikat', 'ips_k_deskripsi', 'seni_p_nilai', 'seni_p_predikat', 'seni_p_deskripsi', 'seni_k_nilai', 'seni_k_predikat', 'seni_k_deskripsi', 'pjok_p_nilai', 'pjok_p_predikat', 'pjok_p_deskripsi', 'pjok_k_nilai', 'pjok_k_predikat', 'pjok_k_deskripsi', 'jawa_p_nilai', 'jawa_p_predikat', 'jawa_p_deskripsi', 'jawa_k_nilai', 'jawa_k_predikat', 'jawa_k_deskripsi', 'created_at', 'updated_at', 'id_nilai'];

    public function getNilaiMapel($id_nilai_mapel = false)
    {
        if ($id_nilai_mapel == false) {
            return $this->findAll();
        }

        return $this->where(['id_nilai_mapel' => $id_nilai_mapel])->first();
    }
}
