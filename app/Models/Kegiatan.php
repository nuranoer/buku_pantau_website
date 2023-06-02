<?php
namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kegiatan', 'id_jadwal', 'tanggal', 'waktu', 'foto', 'id_guru'];

    public function get_data()
    {
        return $this->db->table($this->table)
            ->join('guru', 'guru.id_guru = '.$this->table.'.id_guru', 'left')
            ->join('jadwal', 'jadwal.id_jadwal = kegiatan.id_jadwal', 'left')
            ->select('kegiatan.*, guru.nama_guru AS nama_guru')
            ->select('kegiatan.*, jadwal.hari AS hari')
            ->orderBy($this->table.'.tanggal', 'DESC')->get()->getResultArray();

    }

    public function get_date()
    {
        $query = $this->db->query("SELECT waktu FROM kegiatan");
        $results = $query->getResult();

        foreach ($results as $result) {
            $timestamp = $result->my_timestamp;
            $datetime = DateTime::createFromFormat('U', $timestamp)->format('Y-m-d H:i:s');
            $result->my_datetime = $datetime;
        }

        return $results;
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
        
    public function getDataBySiswa($search)
    {
        $query = $this->db->table('kegiatan')
                        ->join('siswa', 'siswa.id_siswa = kegiatan.id_siswa')
                        ->like('siswa.nama_siswa', $search)
                        ->get();

        return $query->getResultArray();
    }

    public function getFilteredData($tanggal_awal, $tanggal_akhir, $hari)
    {
        $builder = $this->db->table('kegiatan');
        $builder->select('*');
        $builder->join('jadwal', 'jadwal.id_jadwal = kegiatan.id_jadwal');
        $builder->where('tanggal >=', $tanggal_awal);
        $builder->where('tanggal <=', $tanggal_akhir);
        $builder->like('hari', $hari);

        return $builder->get()->getResultArray();
    }

    public function laporan($namaSiswa)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.id_siswa, siswa.nama_siswa, kegiatan.tanggal, wali_murid.nama_wali, guru.nama_guru, kegiatan.nama_kegiatan');
        $builder->join('wali_murid', 'siswa.id_siswa = wali_murid.id_siswa');
        $builder->join('kegiatan', 'guru.id_guru = kegiatan.id_guru');
        $builder->join('guru', 'kegiatan.id_guru = guru.id_guru');
        $builder->where('siswa.nama_siswa', $namaSiswa);
        $query = $builder->get();

        return $query->getResult();
    }
    

}
?>