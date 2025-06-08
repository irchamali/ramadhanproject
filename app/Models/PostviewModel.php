<?php

namespace App\Models;

use CodeIgniter\Model;

class PostviewModel extends Model
{
    protected $table            = 'v_post';
    protected $primaryKey       = 'post_id';
    protected $allowedFields    = ['post_title', 'post_description', 'post_contents', 'post_image', 'post_category_id', 'post_tags', 'post_slug', 'post_status', 'post_views', 'post_user_id'];
    protected $useTimestamps = true;
    protected $createdField  = 'post_date';
    protected $updatedField  = 'post_last_update';

    // Post details without comment
    public function get_post_by_slug($slug)
    {
        $query = $this->db->query("
            SELECT tbl_post.*, 
                tbl_user.user_name, 
                tbl_user.user_photo, 
                tbl_category.*
            FROM tbl_post
            LEFT JOIN tbl_user ON tbl_post.post_user_id = tbl_user.user_id
            LEFT JOIN tbl_category ON tbl_post.post_category_id = tbl_category.category_id
            WHERE tbl_post.post_slug = '$slug'
            GROUP BY tbl_post.post_id
            LIMIT 1
        ");
        return $query;
    }

    public function count_views($user_ip, $post_id)
    {
        $this->db->transStart();
        $this->db->query("INSERT INTO tbl_post_views (view_ip,view_post_id) VALUES('$user_ip','$post_id')");
        $this->db->query("UPDATE tbl_post SET post_views=post_views+1 where post_id='$post_id'");
        $this->db->transComplete();
        if ($this->db->transStatus() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function get_related_post($category_id, $kode)
    {
        return $this->db->table('tbl_post')
            ->select('*')
            ->join('tbl_user', 'tbl_post.post_user_id = tbl_user.user_id', 'left')
            ->where('post_category_id', $category_id)
            ->where('post_id !=', $kode)
            ->orderBy('post_date', 'DESC') // Urutkan berdasarkan tanggal terbaru
            ->limit(4)
            ->get()
            ->getResultArray();
    }

    // Fungsi untuk mendapatkan latest_post dengan pagination dan batasan 3 post
    public function getLatestPosts($limit = 4)
    {
        $this->orderBy('post_date', 'DESC')
             ->where(['post_status' => 1]);

        return $this->paginate($limit, 'posts');
    }

    public function getAllPosts($limit = 9)
    {
        $this->orderBy('post_date', 'DESC')
             ->where(['post_status' => 1]);

        return $this->paginate($limit, 'posts');
    }

    public function search_post($query)
    {
        $result = $this->db->query("
            SELECT tbl_post.*, 
                tbl_user.user_name, 
                tbl_user.user_photo, 
                tbl_category.category_name 
            FROM tbl_post
            LEFT JOIN tbl_user ON tbl_post.post_user_id = tbl_user.user_id
            LEFT JOIN tbl_category ON tbl_post.post_category_id = tbl_category.category_id
            WHERE tbl_post.post_title LIKE '%$query%' 
                OR tbl_category.category_name LIKE '%$query%' 
                OR tbl_post.post_tags LIKE '%$query%' 
            GROUP BY tbl_post.post_id
            ORDER BY tbl_post.post_date DESC
            LIMIT 9
        ");
        return $result;
    }
    
    public function get_all_post($user_id = null)
    { 
        if ($user_id == null) {
            $result = $this->db->query("SELECT post_id,post_title,post_slug,post_user_id,post_image,DATE_FORMAT(post_date,'%d %M %Y') AS post_date,category_name,post_tags,post_status,post_views FROM tbl_post JOIN tbl_category ON post_category_id=category_id");
            return $result;
        } else {
            $result = $this->db->query("SELECT post_id,post_title,post_slug,post_user_id,post_image,DATE_FORMAT(post_date,'%d %M %Y') AS post_date,category_name,post_tags,post_status,post_views FROM tbl_post JOIN tbl_category ON post_category_id=category_id where post_user_id=$user_id");
            return $result;
        }
    }
}
