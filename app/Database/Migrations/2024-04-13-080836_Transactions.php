<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
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
            'user' => [
                'type'       => 'INT',
                'constraint'     => 100,
                'null' => true,
            ],
            'hash' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'amount' => [
                'type'       => 'INT',
                'constraint'     => 10,
                'default' => '0',
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'time' => [
                'type'       => 'BIGINT',
                'null' => true,
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        //
    }
}
