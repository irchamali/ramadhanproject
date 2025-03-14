<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiteModel;

class PrayerTimesController2 extends Controller
{
    public function __construct()
    {
        $this->siteModel = new SiteModel();
    }

    public function index()
    {
        helper('url');

        // API untuk mendapatkan daftar kota
        $api_kota = 'https://api.myquran.com/v2/sholat/kota/semua';
        $kota_data = file_get_contents($api_kota);
        $list_kota = json_decode($kota_data)->data ?? [];

        // Ambil kota dari input GET, jika tidak ada gunakan default
        $kota_terpilih = $this->request->getGet('kota') ?? '1301';

        // API untuk mendapatkan jadwal sholat
        $api_jadwal = 'https://api.myquran.com/v2/sholat/jadwal/' . $kota_terpilih . '/2025/3';
        $jadwal_data = file_get_contents($api_jadwal);
        $jadwal_sholat = json_decode($jadwal_data)->data->jadwal ?? [];

        // Kirim data ke view
        return view('pages/imsakiyah_view', [
            'site' => $this->siteModel->find(1),
            'title' => 'Jadwal Imsakiyah',
            'list_kota' => $list_kota,
            'kota_terpilih' => $kota_terpilih,
            'jadwal_sholat' => $jadwal_sholat
        ]);
    }
}
