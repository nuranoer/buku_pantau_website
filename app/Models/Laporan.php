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
        return $this->select('kegiatan.nama_kegiatan, kegiatan.tanggal, kegiatan.waktu, guru.nama_guru, jadwal.hari')
            ->from('guru,jadwal')
            ->where('kegiatan.id_guru = guru.id_guru')
            ->where('kegiatan.id_jadwal = jadwal.id_jadwal')
            ->where('kegiatan.tanggal >=', $dari)
            ->where('kegiatan.tanggal <=', $sampai)
            ->get()
            ->getResultArray();
    }
        
    
    



}
?>