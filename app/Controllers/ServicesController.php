<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\AuthorModel;
use App\Models\HomeModel;
use App\Models\SiteModel;
use App\Models\ServiceAdminModel;

class ServicesController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
        $this->serviceModel = new ServiceAdminModel();
    }
    
    public function index($slug = null) 
    {
        if ($slug == null) {
            $data = [
                'site' => $this->siteModel->find(1),
                'home' => $this->homeModel->find(1),
                'about' => $this->aboutModel->find(1),
                'services' => $this->serviceModel->getAllServices(),
                'pager' => $this->serviceModel->pager,
                'title' => 'Services',
                'active' => 'service'
            ];
            return view('pages/services_view', $data);
        }

        // Ambil data service berdasarkan slug
        $service = $this->serviceModel->getServiceBySlug($slug);

        // Jika service tidak ditemukan, redirect ke halaman utama service
        if (!$service) {
            return redirect()->to('/service')->with('error', 'Service tidak ditemukan.');
        }

        $service_id = $service['service_id']; // Aman karena sudah dicek

        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'service' => $service,
            
            'title' => $service['service_name'],
            'active' => 'service'
        ];

        return view('pages/service_detail', $data);
    }


    public function search()
    {
        $query = $this->request->getGet('search_query');
        if (!$query) {
            return redirect()->to('/service');
        }
        $result = $this->serviceModel->search_service($query);
        if ($result->getNumRows() < 1) {
            $services = $result->getResultArray();
            $keyword = "'$query' tidak ditemukan";
        } else {
            $services = $result->getResultArray();
            $keyword = "$query ";
        }
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'title' => 'Search',
            'keyword' => $keyword,
            'services' => $services,
            'active' => 'service'
        ];
        return view('pages/service_search', $data);
    }
}
