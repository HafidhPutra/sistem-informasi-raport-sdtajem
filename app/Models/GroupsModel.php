<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupsModel extends Model
{
    protected $table      = 'auth_groups';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'name'];

    public function getGroups($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    function getAll()
    {
        $builder = $this->db->table('auth_groups');
        $builder->join('auth_groups_users', 'auth_groups_users.group_id = auth_groups.id');
        $query = $builder->get();
        return $query->getResult();
    }
}
