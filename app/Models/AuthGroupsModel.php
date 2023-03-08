<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupsModel extends Model
{
    protected $table      = 'auth_groups_users';
    protected $primaryKey = 'user_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['group_id', 'user_id'];

    public function getAuth($user_id = false)
    {
        if ($user_id == false) {
            return $this->findAll();
        }

        return $this->where(['user_id' => $user_id])->first();
    }

    public function cek_data($group_id)
    {
        return $this->db->table('auth_groups_users')
            ->where('group_id', $group_id)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('auth_groups_users')->insert($data);
    }
}
