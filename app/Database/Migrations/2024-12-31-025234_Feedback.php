<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Feedback extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_feedback' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],            
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kesan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],            
            'pesan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATE',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],

        ]);
        $this->forge->addKey('id_feedback', true);
        $this->forge->createTable('feedback');
    }

    public function down()
    {
        $this->forge->dropTable('feedback');
    }
}
