<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiteModel;

class PrayerTimesController extends Controller
{
    public function __construct()
    {
        $this->siteModel = new SiteModel();
        
    }
    public function index()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            
            'title' => 'Jadwal Sholat Harian',
            'active' => 'Jadwal Sholat'
        ];
        return view('prayer_view', $data);
    }

}