<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\HomeModel;
use App\Models\SiteModel;
use App\Models\PublikasiModel;
use App\Models\PudosModel;

class PudosController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
        $this->publikasiModel = new PublikasiModel();
        $this->pudosModel = new PudosModel();
    }
    public function index()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'documents' => $this->pudosModel->findAll(),
            'title' => 'Publikasi Dosen',
            'active' => 'Tentang'
        ];
        return view('pages/pudos_view', $data);
    }
}
