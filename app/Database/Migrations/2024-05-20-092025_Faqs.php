<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faqs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'question' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'answer' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('faqs');
    }

    public function down()
    {
        $this->forge->dropTable('faqs');
    }
}
