<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\CategoryModel;
use App\Models\HomeModel;
use App\Models\PostModel;
use App\Models\SiteModel;

class CategoryController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
        $this->postModel = new PostModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index($slug = null)
    {
        if ($slug == null) {
            return redirect()->to('/post');
        }

        $posts = $this->categoryModel->get_post_by_category($slug);
        $pager = $this->categoryModel->pager;

        $keyword = empty($posts) ? "'$slug' tidak ditemukan" : "$slug";

        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'posts' => $posts,
            'pager' => $pager, // Pastikan ini dikirim ke view
            'title' => 'Category',
            'keyword' => $keyword,
            'active' => 'Post'
        ];
        
        return view('posts/post_category', $data);
    }

}
