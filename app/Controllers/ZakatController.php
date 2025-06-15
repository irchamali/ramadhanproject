<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\HomeModel;
use App\Models\SiteModel;

class ZakatController extends BaseController
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
            'title' => 'Kalkulator Zakat',
            'active' => 'Zakat'
        ];
        return view('pages/kalkulator_zakat', $data);
    }

    public function getHargaEmas()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->get('https://logam-mulia-api.vercel.app/prices/anekalogam');
        $data = json_decode($response->getBody(), true);

        if (isset($data['data'][0]['sell'])) {
            return $this->response->setJSON(['harga_emas' => (int) $data['data'][0]['sell']]);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Tidak dapat ambil harga emas']);
        }
    }

}
