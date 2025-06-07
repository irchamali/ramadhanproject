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
        helper('url');

        // API untuk mendapatkan daftar kota
        $api_kota = 'https://api.myquran.com/v2/sholat/kota/semua';
        $kota_data = file_get_contents($api_kota);
        $list_kota = json_decode($kota_data)->data ?? [];

        // Ambil kota dari input GET, jika tidak ada gunakan default
        $kota_terpilih = $this->request->getGet('kota') ?? '1301';

        // Tanggal hari ini
        $tanggal_hari_ini = date('Y-m-d');
        $tahun = date('Y');
        $bulan = date('n');

        // API untuk mendapatkan jadwal sholat bulan ini
        $api_jadwal = 'https://api.myquran.com/v2/sholat/jadwal/' . $kota_terpilih . '/' . $tahun . '/' . $bulan;
        $jadwal_json = file_get_contents($api_jadwal);
        $jadwal_data = json_decode($jadwal_json);
        $jadwal_sholat = $jadwal_data->data->jadwal ?? [];

        // Ambil hanya data hari ini
        $jadwal_hari_ini = null;
        foreach ($jadwal_sholat as $jadwal) {
            if ($jadwal->date === $tanggal_hari_ini) {
                $jadwal_hari_ini = $jadwal;
                break;
            }
        }

        $lokasi = $jadwal_data->data->lokasi ?? null;
        $daerah = $jadwal_data->data->daerah ?? null;

        return view('pages/prayer_time', [
            'site' => $this->siteModel->find(1),
            'title' => 'Jadwal Sholat',
            'list_kota' => $list_kota,
            'kota_terpilih' => $kota_terpilih,
            'jadwal_hari_ini' => $jadwal_hari_ini,
            'lokasi' => $lokasi,
            'daerah' => $daerah
        ]);

    }
}
