<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Laporan;
use App\Models\Kegiatan;
use App\Models\Siswa;
use App\Models\Jadwal;

class LaporanController extends BaseController{
    private Laporan $laporan;

    public function __construct()
    {
        $this->laporan = new Laporan();
        $this->laporan->asObject();
    }

    public function laporansiswa(){
        $laporan = new Laporan();
        $data['laporan'] = $laporan->get_data();
        echo view('admin/datalaporan/laporansiswa/index', $data);
    }

    public function laporanperminggu(){
        $laporan = new Laporan();
        $data['laporan'] = $laporan->get_data();
        echo view('admin/datalaporan/laporanperminggu/index', $data);
    }

}
?>