<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\HomeModel;
use App\Models\PartnerAdminModel;
use App\Models\PartnerCategoryModel;
use App\Models\SiteModel;

class CategoryPartController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
        $this->partnerModel = new PartnerAdminModel();
        $this->categoryModel = new PartnerCategoryModel();
    }
    
    public function index($slug = null)
    {
        if ($slug == null) {
            return redirect()->to('/partner');
        }

        // Ambil data dari model
        $documents = $this->categoryModel->getPartner_by_category($slug);

        // Perbaiki pengecekan jumlah data menggunakan count()
        if (count($documents) < 1) {
            $keyword = "Partner '$slug' tidak ditemukan";
        } else {
            $keyword = "Partner: $slug ";
        }

        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'partners' => $documents, // Gunakan hasil query langsung
            'title' => 'Kerjasama',
            'url' => 'partner',
            'keyword' => $keyword,
            'documents' => $documents,
            'active' => 'Kerjasama'
        ];

        return view('pages/partner_category', $data);
    }

}
