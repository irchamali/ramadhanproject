<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'tbl_post';  // Gunakan tabel utama (bukan category)
    protected $primaryKey       = 'post_id';
    protected $allowedFields    = ['post_title', 'post_slug', 'post_content', 'post_image', 'post_date', 'post_status', 'post_category_id', 'post_user_id'];

    public function get_post_by_category($slug, $limit = 9)
    {
        return $this->select('tbl_post.*, tbl_category.category_name, tbl_category.category_slug, tbl_user.user_name, tbl_user.user_photo')
                    ->join('tbl_category', 'tbl_post.post_category_id = tbl_category.category_id', 'left')
                    ->join('tbl_user', 'tbl_post.post_user_id = tbl_user.user_id', 'left')
                    ->where('tbl_category.category_slug', $slug)
                    ->where('tbl_post.post_status', 1) // Hanya menampilkan post aktif
                    ->orderBy('tbl_post.post_date', 'DESC')
                    ->paginate($limit, 'posts'); // Sesuai dengan 'posts' di view
    }
    
    public function getAllCategoriesWithPosts()
    {
        return $this->select('c.category_id, c.category_name, c.category_slug, COUNT(p.post_id) as total_posts')
                    ->from('tbl_category c') // Memberikan alias unik "c" untuk tbl_category
                    ->join('tbl_post p', 'p.post_category_id = c.category_id', 'left') // Alias "p" untuk tbl_post
                    ->groupBy('c.category_id')
                    ->orderBy('total_posts', 'DESC')
                    ->findAll();
    }
    
}
