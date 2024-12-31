<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Internships extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel internships
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'instansi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'mulai' => [
                'type' => 'DATE',
            ],
            'selesai' => [
                'type' => 'DATE',
            ],
            'surat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'rekomendasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_penerimaan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => 'belum diterima', // Default belum diterima
            ],
            'kode_pendaftaran' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'unique' => true,
            ],
            'created_at' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);
        
        // Membuat tabel internships
        $this->forge->createTable('internships', TRUE);
    }

    public function down()
    {
        // menghapus tabel internships
        $this->forge->dropTable('internships');
    }
}
