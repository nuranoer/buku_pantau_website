<?php
namespace App\Models;

use CodeIgniter\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['tanggal', 'id_jadwal', 'id_siswa', 'id_kegiatan', 'keterangan'];

    public function get_data()
    {
        return $this->db->table($this->table)
            ->join('siswa', 'siswa.id_siswa = '.$this->table.'.id_kegiatan', 'left')
            ->join('kegiatan', 'kegiatan.id_kegiatan = laporan.id_kegiatan', 'left')
            ->join('jadwal', 'jadwal.id_jadwal = laporan.id_jadwal', 'left')
            ->select('laporan.*, siswa.nama_siswa AS nama_siswa')
            ->select('laporan.*, siswa.alamat_siswa AS alamat_siswa')
            ->select('laporan.*, kegiatan.nama_kegiatan AS nama_kegiatan')
            ->select('laporan.*, jadwal.hari AS hari')
            ->orderBy($this->table.'.id_laporan', 'DESC')->get()->getResultArray();

    }

}
?>