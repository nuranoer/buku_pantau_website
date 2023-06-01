<?php

namespace App\Controllers;

use App\Models\Absensi;
use Exception;

class AbsensiController extends BaseController
{

    private Absensi $absensi;

    public function __construct()
    {
        $this->absensi = new Absensi();
        $this->absensi->asObject();
    }

    public function index()
    {
        $absensiModel = new Absensi();
        $data['rekapitulasi'] = $absensiModel->get_data();

        return view('admin/dataabsensi/index', $data);
    }

    public function lihat($id_siswa)
    {
         $absensiModel = new Absensi();
         
         $data['detail'] = $absensiModel->detail($id_siswa);
    
         //dd($data);
         return view('admin/dataabsensi/lihat', $data);
    }

    public function delete($id_siswa){
        try {
            $this->absensi->delete($id_siswa);
        } catch (Exception $e) {
            return redirect()->to('/absensi')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/absensi')->with('success', 'Berhasil menghapus data');
    }
}
