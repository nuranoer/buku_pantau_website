<?php
namespace App\Models;

use CodeIgniter\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nip', 'nama_guru', 'alamat_guru', 'jenis_kelamin', 'agama', 'no_hp', 'status_perkawinan', 'id_jadwal'];

    public function get_data()
    {
        return $this->db->table($this->table)
            ->join('jadwal', 'jadwal.id_jadwal = '.$this->table.'.id_jadwal', 'left')
            ->select('guru.*, jadwal.hari AS hari')
            ->orderBy($this->table.'.id_guru', 'ASC')->get()->getResultObject();
    }

    public function detail($id_guru)
    {
        return $this->db->table($this->table)
            ->join('jadwal', 'jadwal.id_jadwal = '.$this->table.'.id_jadwal', 'left')
            ->select('guru.*, jadwal.hari AS hari')
            ->orderBy($this->table.'.id_guru', $id_guru)->get()->getResultArray();
    }


}
?>