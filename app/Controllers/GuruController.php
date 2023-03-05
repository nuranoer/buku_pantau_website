<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guru;
use App\Models\Jadwal;
use Exception;

class GuruController extends BaseController
{
    private Guru $guru;

    public function __construct()
    {
        $this->guru = new Guru();
        $this->guru->asObject();
    }

    public function index()
    {
        $data = [
            'guru' => $this->guru->get_data(),
        ];
        echo view('admin/dataguru/index', $data);
    }

    public function lihat($id_guru)
    {
       $guru = new Guru();
       $data['detail'] = $guru->detail($id_guru);

       //dd($data);
       return view('admin/dataguru/lihat', $data);  
    }


    public function new()
    {
        $jadwal = new Jadwal();
        $data = [
            'jadwal' => $jadwal->findAll(),
            'guru' => $this->guru->findAll(),
            'validation' => \Config\Services::validation()
        ];
       
		echo view('admin/dataguru/add', $data);
    }
    public function save()
    {
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama_guru' => $this->request->getVar('nama_guru'),
            'alamat_guru' => $this->request->getVar('alamat_guru'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'no_hp' => $this->request->getVar('no_hp'),
            'status_perkawinan' => $this->request->getVar('status_perkawinan'),
            'id_jadwal' => $this->request->getVar('id_jadwal'),
        ];
        
        if(!$this->validate([
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIP harus diisi'
                ]
            ],
            'nama_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            'alamat_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Harus Diisi'
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agama Harus Diisi'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP Harus Diisi'
                ]
            ],
            'status_perkawinan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Perkawinan Harus Diisi'
                ]
            ],
            'id_jadwal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jadwal Harus Diisi'
                ]
            ],
        ]))

        if (!$this->guru->validate($data)) {
            session()->setFlashdata('error','Mohon cek kembali data Anda!');
            return redirect()->to('guru/new')->withInput()->with('errors', $this->guru->errors());
        }
        
        try {
            $this->guru->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('guru/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('success','Data Guru berhasil ditambahkan!');
        return redirect()->to('/guru')->with('success', 'Berhasil menambahkan data');

    }
    public function edit($id_guru)
    {
        $model = $this->guru;
        $jadwal = new Jadwal();
        $data['guru'] = $model->where('id_guru', $id_guru)->first();
        $data['jadwal'] = $jadwal->findAll();
        $data['validation'] = \Config\Services::validation();
        
        //dd($data);
        echo view('admin/dataguru/edit', $data);
    }
    public function update($id_guru)
    {
        
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama_guru' => $this->request->getVar('nama_guru'),
            'alamat_guru' => $this->request->getVar('alamat_guru'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'no_hp' => $this->request->getVar('no_hp'),
            'status_perkawinan' => $this->request->getVar('status_perkawinan'),
            'id_jadwal' => $this->request->getVar('id_jadwal'),
        
        ];

        if (!$this->guru->validate($data)) {
            return redirect()->to('guru/edit/'. $id_guru .'')->withInput()->with('errors', $this->guru->errors());
        }

        try {
            $this->guru->protect(false)->update($id_guru, $data);
        } catch (Exception $e) {
            return redirect()->to('guru/edit/'. $id_guru .'')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/guru')->with('success', 'Berhasil mengupdate data');
    }





    public function delete($id_guru){
        try {
            $this->guru->delete($id_guru);
        } catch (Exception $e) {
            return redirect()->to('/guru')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/guru')->with('success', 'Berhasil menghapus data');
    }

}
?>