<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table            = 'tbl_member';
    protected $primaryKey       = 'member_id';
    protected $allowedFields    = ['member_name', 'member_link', 'member_desc', 'member_image'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getAllMembers()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}
