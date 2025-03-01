<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\HomeModel;
use App\Models\PudosModel;
use App\Models\PudosCategoryModel;
use App\Models\SiteModel;

class CategoryPudosController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
        $this->pudosModel = new PudosModel();
        $this->pudoscategoryModel = new PudoscategoryModel();
    }
    public function index($slug = null)
    {
        if ($slug == null) {
            return redirect()->to('/document');
        }
        $documents = $this->pudoscategoryModel->getDocs_by_category($slug);
        if ($documents->getNumRows() < 1) {
            $documents = $documents->getResultArray();
            $keyword = "Dokumen '$slug' tidak ditemukan";
        } else {
            $documents = $documents->getResultArray();
            $keyword = "Dokumen: $slug ";
        }
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'documents' => $this->pudoscategoryModel->getDocs_by_category($slug),
            'title' => 'Document',
            'url' => 'document',
            'keyword' => $keyword,
            'documents' => $documents,
            'active' => 'Document'
        ];
        return view('pudos_category', $data);
    }
}
