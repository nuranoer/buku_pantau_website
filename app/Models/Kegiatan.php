<?php
namespace App\Models;

use CodeIgniter\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenis_kegiatan','nama_kegiatan', 'tanggal', 'waktu', 'foto', 'id_guru'];

    public function get_data()
    {
        return $this->db->table($this->table)
            ->join('guru', 'guru.id_guru = '.$this->table.'.id_guru', 'left')
            ->join('jadwal', 'jadwal.id_jadwal = guru.id_jadwal', 'left')
            ->select('kegiatan.*, guru.nama_guru AS nama_guru')
            ->select('kegiatan.*, jadwal.hari AS hari')
            ->orderBy($this->table.'.id_kegiatan', 'DESC')->get()->getResultArray();

    }

    public function detail($id_kegiatan)
    {
        return $this->db->table($this->table)
            ->join('guru', 'guru.id_guru = '.$this->table.'.id_guru', 'left')
            ->join('jadwal', 'jadwal.id_jadwal = guru.id_jadwal', 'left')
            ->select('kegiatan.*, guru.nama_guru AS nama_guru')
            ->select('kegiatan.*, jadwal.hari AS hari')
            ->orderBy($this->table.'.id_kegiatan', $id_kegiatan)->get()->getResultArray();

    }

}
?>