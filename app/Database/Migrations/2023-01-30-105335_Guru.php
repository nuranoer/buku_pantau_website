<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guru extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nip'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'null'           => true,
			],
			'nama_guru'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '99',
                'null'           => true,
			],
			'alamat_guru'      => [
                'type'           => 'VARCHAR',
                'null'           => true,
                'constraint'    => '99',
			],
			'jenis_kelamin' => [
                'type'           => 'CHAR',
                'constraint'     => '50',
                'null'           => true,
			],
			'agama' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
			],
            'no_hp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => true,
            ],
            'status_perkawinan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
            ],
            'id_jadwal' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => true,
            ],
		]);

		// set Primary Key
		$this->forge->addKey('id_guru', TRUE);

		$this->forge->createTable('guru', TRUE);

    }

    public function down()
    {
        $this->forge->dropTable('guru');
    }
}
