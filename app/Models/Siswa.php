<?php
namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nomor_induk', 'nama_siswa', 'alamat_siswa', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'id_wali'];

    public function get_data()
    {
        return $this->db->table($this->table)
            ->join('wali_murid', 'wali_murid.id_wali = '.$this->table.'.id_wali', 'left')
            ->select('siswa.*, wali_murid.nama_wali AS nama_wali')
            ->orderBy($this->table.'.id_siswa', 'ASC')->get()->getResultArray();

    }
    public function detail($id_siswa)
    {
        return $this->db->table($this->table)
            ->join('wali_murid', 'wali_murid.id_wali = '.$this->table.'.id_wali', 'left')
            ->select('siswa.*, wali_murid.nama_wali AS nama_wali')
            ->orderBy($this->table.'.id_siswa', $id_siswa)->get()->getResultArray();

    }

}
?>