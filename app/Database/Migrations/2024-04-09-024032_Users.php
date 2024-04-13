<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'balance' => [
                'type'       => 'INT',
                'constraint'     => 10,
                'default' => '0',
            ],
            'referral_code' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'reff_by' => [
                'type'       => 'INT',
                'constraint'     => 100,
                'null' => true,
            ],
            'remember_token' => [
                'type'       => 'VARCHAR',
                'constraint'     => 50,
                'null' => true,
            ],
            'last_claim' => [
                'type'       => 'BIGINT',
                'null' => true,
            ],
            'energy' => [
                'type'       => 'INT',
                'constraint'     => 10,
                'default' => '0',
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
