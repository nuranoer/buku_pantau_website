<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Siswa;
use App\Models\Wali;
use Exception;

class SiswaController extends BaseController
{
    private Siswa $siswa;

    public function __construct()
    {
        $this->siswa = new Siswa();
        $this->siswa->asObject();
    }

    public function index()
    {
        $data['siswa'] = $this->siswa->get_data();
        echo view('admin/datasiswa/index', $data);
    }
    public function lihat($id_siswa)
    {
       $siswa = new Siswa();
       $data['detail'] = $siswa->detail($id_siswa);

       //dd($data);
       return view('admin/datasiswa/lihat', $data);  
    }


    public function new()
    {
        $wali = new Wali();
        $data = [
            'wali' => $wali->findAll(),
            'validation' => \Config\Services::validation()
        ];
       
		echo view('admin/datasiswa/add', $data);
    }
    public function save()
    {
        $data = [
            'nomor_induk' => $this->request->getVar('nomor_induk'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'alamat_siswa' => $this->request->getVar('alamat_siswa'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'id_wali' => $this->request->getVar('id_wali'),
        ];
        
        if(!$this->validate([
            'nomor_induk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Induk harus diisi'
                ]
            ],
            'nama_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            'alamat_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Harus Diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus Diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Harus Diisi'
                ]
            ],
            'id_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wali Harus Dipilih'
                ]
            ],
        ]))
        if (!$this->siswa->validate($data)) {
            return redirect()->to('siswa/new')->withInput()->with('errors', $this->siswa->errors());
        }
        
        try {
            $this->siswa->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('siswa/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        return redirect()->to('/siswa')->with('success', 'Berhasil menambahkan data');

    }
    public function edit($id_siswa)
    {
        $model = $this->siswa;
        $wali = new Wali();
        $data['wali'] = $wali->findAll();
        $data['siswa'] = $model->where('id_siswa', $id_siswa)->first();
        $data['validation'] = \Config\Services::validation();       
        echo view('admin/datasiswa/edit', $data);
    }
    public function update($id_siswa)
    {
        
        $data = [
            'nomor_induk' => $this->request->getVar('nomor_induk'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'alamat_siswa' => $this->request->getVar('alamat_siswa'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'id_wali' => $this->request->getVar('id_wali'),
        
        ];

        if (!$this->siswa->validate($data)) {
            return redirect()->to('siswa/edit/'. $id_siswa .'')->withInput()->with('errors', $this->siswa->errors());
        }

        try {
            $this->siswa->protect(false)->update($id_siswa, $data);
        } catch (Exception $e) {
            return redirect()->to('siswa/edit/'. $id_siswa .'')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/siswa')->with('success', 'Berhasil mengupdate data');
    }


    public function delete($id_siswa){
        try {
            $this->siswa->delete($id_siswa);
        } catch (Exception $e) {
            return redirect()->to('/siswa')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/siswa')->with('success', 'Berhasil menghapus data');
    }

}
?>