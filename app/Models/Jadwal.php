<?php
namespace App\Models;

use CodeIgniter\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_jadwal','hari','jenis_kegiatan'];

}


?>