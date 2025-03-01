<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\HomeModel;
use App\Models\SiteModel;

class PrgPendidikanController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
    }
    public function index()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'title' => 'Pendidikan',
            'active' => 'Program'
        ];
        return view('program/edu_view', $data);
    }
    public function tk()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'title' => 'TK NU Patrol',
            'active' => 'Program'
        ];
        return view('program/edu_view', $data);
    }
    public function sd()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'title' => 'SD NU Patrol',
            'active' => 'Program'
        ];
        return view('program/edu_view', $data);
    }
    public function smp()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'title' => 'SMP NU Patrol',
            'active' => 'Program'
        ];
        return view('program/edu_view', $data);
    }
    public function sma()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'title' => 'SMA NU Patrol',
            'active' => 'Program'
        ];
        return view('program/edu_view', $data);
    }
}
