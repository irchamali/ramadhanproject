<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\HomeModel;
use App\Models\SiteModel;
use App\Models\PartnerAdminModel;

class PartnershipController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
        $this->partnerModel = new PartnerAdminModel();
    }
    public function index()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'partners' => $this->partnerModel->getAllPartners(),
            'title' => 'Kerjasama',
            'active' => 'Tentang'
        ];
        return view('pages/partners_view', $data);
    }
}
