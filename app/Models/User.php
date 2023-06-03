<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users'; // Ganti 'users' dengan nama tabel yang sesuai di database

    public function getFullName($userId)
    {
        $query = $this->select('fullname')->where('id', $userId)->first();
        return $query ? $query['fullname'] : null;
    }
}
