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

    public function new()
    {
        $guru = new Guru();
        $jadwal = new Jadwal();
        $data = [
            'guru' => $guru->findAll(),
            'jadwal' => $jadwal->findAll(),
            'validation' => \Config\Services::validation()
        ];
       
		echo view('admin/datakegiatan/add', $data);
    }
    public function save()
    {
        $data = [
            'id_jadwal' => $this->request->getVar('id_jadwal'),
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'waktu' => $this->request->getVar('waktu'),
            'id_guru' => $this->request->getVar('id_guru'),
        ];
        
        if(!$this->validate([
            'id_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID Harus Di pilih'
                ]
            ],
            'nama_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus Diisi'
                ]
            ],
            'Waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu Harus Diisi'
                ]
            ],
            'id_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Guru Harus Dipilih'
                ]
            ],
        ]))

        if (!$this->kegiatan->validate($data)) {
            return redirect()->to('kegiatan/new')->withInput()->with('errors', $this->kegiatan->errors());
        }

        try {
            $this->kegiatan->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('kegiatan/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        return redirect()->to('/kegiatan')->with('success', 'Berhasil menambahkan data');

    }
    public function edit($id_kegiatan)
    {
        $model = $this->kegiatan;
        $guru = new Guru();
        
        $data['kegiatan'] = $model->where('id_kegiatan', $id_kegiatan)->first();
        $data['guru'] = $guru->findAll();
        $data['validation'] = \Config\Services::validation();        
        echo view('admin/datakegiatan/edit', $data);
    }
    public function update($id_kegiatan)
    {
        
        $data = [
            'jenis_kegiatan' => $this->request->getVar('jenis_kegiatan'),
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'waktu' => $this->request->getVar('waktu'),
            'id_guru' => $this->request->getVar('id_guru'),
        
        ];

        if (!$this->kegiatan->validate($data)) {
            return redirect()->to('kegiatan/edit/'. $id_kegiatan .'')->withInput()->with('errors', $this->kegiatan->errors());
        }

        try {
            $this->kegiatan->protect(false)->update($id_kegiatan, $data);
        } catch (Exception $e) {
            return redirect()->to('kegiatan/edit/'. $id_kegiatan .'')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/kegiatan')->with('success', 'Berhasil mengupdate data');
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

}
?>