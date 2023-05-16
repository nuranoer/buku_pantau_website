<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kegiatan;

class PageController extends BaseController
{
    public function index()
    {
        return view('template/app');
    }

    public function dashboard()
    {
        $guru = new Guru();
        $siswa = new Siswa();
        $kegiatan = new Kegiatan();
        $data['jumlah_guru'] = $guru->countAll();
        $data['jumlah_siswa'] = $siswa->countAll();
        $data['jumlah_kegiatan'] = $kegiatan->countAll();
        return view('template/dashboard', $data);
    }
}