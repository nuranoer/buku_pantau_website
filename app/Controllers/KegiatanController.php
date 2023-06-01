<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kegiatan;
use App\Models\Jadwal;
use App\Models\Guru;
use Exception;

class KegiatanController extends BaseController
{
    private Kegiatan $kegiatan;

    public function __construct()
    {
        $this->kegiatan = new Kegiatan();
        $this->kegiatan->asObject();
    }

    public function index()
    {
        $data['kegiatan'] = $this->kegiatan->get_data();
        echo view('admin/datakegiatan/index', $data);
    }

    public function lihat($id_kegiatan)
    {
         $kegiatan = new Kegiatan();
         
         $data['detail'] = $kegiatan->detail($id_kegiatan);
    
         //dd($data);
         return view('admin/datakegiatan/lihat', $data);
    }


    public function delete($id_kegiatan){
        $kegiatan = new Kegiatan();

        $data = $kegiatan->find($id_kegiatan);
        $imageFile = $data['image'];
        if (file_exists('uploads/kegiatan/' . $imageFile)) {
            unlink('uploads/kegiatan/' . $imageFile);
        }
        try {
            $this->kegiatan->delete($id_kegiatan);
        } catch (Exception $e) {
            return redirect()->to('/kegiatan')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/kegiatan')->with('success', 'Berhasil menghapus data');
    }

    public function filterData()
    {
        $search = $this->request->getVar('nama_siswa');
        $data['kegiatan'] = $this->kegiatan->getDataBySiswa($search);
    
        return view('data', $data);
    }

    public function filterDatabyTanggal()
    {
        $tanggal_awal = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');
        $hari = $this->request->getGet('hari');

        $data['kegiatans'] = $this->kegiatan->getFilteredData($tanggal_awal, $tanggal_akhir, $hari);

        return view('filter_data', $data);
    }

}
?>