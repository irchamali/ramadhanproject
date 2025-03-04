<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'user_id';
    protected $allowedFields    = ['user_name'];

    function get_post_by_authors($author)
    {
        $query = $this->db->query("SELECT tbl_post.*,user_name,user_photo FROM tbl_post
			LEFT JOIN tbl_user ON post_user_id=user_id
			WHERE user_name LIKE '%$author%'
            ORDER BY tbl_post.post_date DESC"); // Menambahkan klausa ORDER BY
        return $query;
    }
}
