<?php
namespace App\Models;

use CodeIgniter\Model;

class Laporan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kegiatan', 'id_jadwal', 'tanggal', 'waktu', 'foto', 'id_guru'];

    public function getLaporan($dari, $sampai)
    {
        return $this->table($this->table)
            ->join('guru', 'guru.id_guru = '.$this->table.'.id_guru', 'left')
            ->join('jadwal', 'jadwal.id_jadwal = '.$this->table.'.id_jadwal', 'left')
            ->select('kegiatan.*, guru.nama_guru AS nama_guru, jadwal.hari AS hari')
            ->where('tanggal >=', $dari)
            ->where('tanggal <=', $sampai)
            ->get()
            ->getResultArray();
    }
        
    
    



}
?>