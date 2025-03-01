<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\HomeModel;
use App\Models\PostModel;
use App\Models\SiteModel;
use App\Models\PostviewModel;

class GalleryController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
        $this->postModel = new PostModel();
        $this->postviewModel = new PostviewModel();
    }
    public function index()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            // 'posts' => $this->postModel->findAll(),
            'posts' => $this->postviewModel->getLatestPosts(),
            'title' => 'Gallery',
            'active' => 'Gallery'
        ];
        return view('pages/gallery_view', $data);
    }
}
