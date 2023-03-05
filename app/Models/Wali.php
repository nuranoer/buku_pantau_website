<?php
namespace App\Models;

use CodeIgniter\Model;

class Wali extends Model
{
    protected $table = 'wali_murid';
    protected $primaryKey = 'id_wali';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['email', 'nama_wali', 'username', 'password', 'id_siswa'];

    public function get_data()
    {
        return $this->db->table($this->table)
            ->join('siswa', 'siswa.id_siswa = '.$this->table.'.id_wali', 'left')
            ->select('wali_murid.*, siswa.nama_siswa AS nama_siswa')
            ->orderBy($this->table.'.id_wali', 'DESC')->get()->getResultArray();

    }
}
?>