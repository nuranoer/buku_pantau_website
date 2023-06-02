<?php
namespace App\Models;

use CodeIgniter\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_siswa', 'tanggal', 'kehadiran'];

    public function get_data()
    {

        $builder = $this->db->table($this->table)
        ->join('siswa', 'siswa.id_siswa = ' . $this->table . '.id_siswa', 'left')
        ->select($this->table . '.id_siswa, COUNT(' . $this->table . '.kehadiran) as jumlah_kehadiran, siswa.nama_siswa AS nama_siswa')
        ->groupBy($this->table . '.id_siswa')
        ->orderBy($this->table . '.id_siswa', 'ASC')
        ->get();

        return $builder->getResultArray();
    }

    public function detail($id_siswa)
    {
        return $this->db->table($this->table)
        ->join('siswa', 'siswa.id_siswa = ' . $this->table . '.id_siswa', 'left')
        ->select($this->table . '.*, siswa.nama_siswa AS nama_siswa')
        ->where($this->table . '.id_siswa', $id_siswa)
        ->orderBy($this->table . '.tanggal', 'ASC')
        ->get()
        ->getResultArray();
    }
}
?>