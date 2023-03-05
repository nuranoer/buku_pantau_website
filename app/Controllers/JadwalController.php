<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jadwal;
use Exception;

class JadwalController extends BaseController
{
    private Jadwal $jadwal;

    public function __construct()
    {
        $this->jadwal = new Jadwal();
        $this->jadwal->asObject();
    }

    public function index()
    {
        $data['jadwal'] = $this->jadwal->findAll();
        echo view('admin/datajadwal/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
       
		echo view('admin/datajadwal/add', $data);
    }
    public function save()
    {
        $data = [
            'hari' => $this->request->getVar('hari'),
            'jenis_kegiatan' => $this->request->getVar('jenis_kegiatan'),

        ];
        
        if(!$this->validate([
            'hari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hari harus dipilih'
                ]
            ],
            'jenis_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kegiatan Harus Dipilih'
                ]
            ],
        ]))

        if (!$this->jadwal->validate($data)) {
            return redirect()->to('jadwal/new')->withInput()->with('errors', $this->jadwal->errors());
        }
        try {
            $this->jadwal->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('jadwal/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        return redirect()->to('/jadwal')->with('success', 'Berhasil menambahkan data');

    }
    public function edit($id_jadwal)
    {
        $model = $this->jadwal;
        
        $data['jadwal'] = $model->where('id_jadwal', $id_jadwal)->first();
        $data['validation'] = \Config\Services::validation();        
        echo view('admin/datajadwal/edit', $data);
    }
    public function update($id_jadwal)
    {
        
        $data = [
            'hari' => $this->request->getVar('hari'),
            'id_kegiatan' => $this->request->getVar('id_kegiatan'),
        
        ];

        if (!$this->jadwal->validate($data)) {
            return redirect()->to('jadwal/edit/'. $id_jadwal .'')->withInput()->with('errors', $this->jadwal->errors());
        }

        try {
            $this->jadwal->protect(false)->update($id_jadwal, $data);
        } catch (Exception $e) {
            return redirect()->to('jadwal/edit/'. $id_jadwal .'')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/jadwal')->with('success', 'Berhasil mengupdate data');
    }


    public function delete($id_jadwal){
        try {
            $this->jadwal->delete($id_jadwal);
        } catch (Exception $e) {
            return redirect()->to('/jadwal')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/jadwal')->with('success', 'Berhasil menghapus data');
    }

}
?>