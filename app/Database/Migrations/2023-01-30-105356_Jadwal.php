<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadwal extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_jadwal'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
				'unsigned'       => true,
			],
			'hari'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
                'null'           => true,
			],
			'id_kegiatan'       => [
				'type'           => 'INT',
				'constraint'     => '11',
                'null'           => true,
			],
		]);

        		// set Primary Key
		$this->forge->addKey('id_jadwal', TRUE);

		$this->forge->createTable('jadwal', TRUE);

    }

    public function down()
    {
        $this->forge->dropTable('jadwal');
    }
}
