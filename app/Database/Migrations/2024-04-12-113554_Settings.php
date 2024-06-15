<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_setting' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'sitename' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'keyword' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'reward_rate' => [
                'type'       => 'DECIMAL',
                'constraint'     => '16,8',
                'default' => '0.00000000',
            ],
            'reward_reff' => [
                'type'       => 'INT',
                'constraint'     => 100,
                'default' => '10',
            ],
            'free_energy' => [
                'type'       => 'INT',
                'constraint'     => 10,
                'default' => '0',
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id_setting', true);
        $this->forge->createTable('settings');
        $initialData = [
            [
                'sitename'     => 'Flozz Faucet',
                'keyword'     => 'Faucet',
                'description'     => 'Get reward with easy',
                'reward_rate'     => '1.00000000',
                'reward_reff'   => '10',
                'free_energy'     => '10',
            ],
        ];
        $this->db->table('settings')->insertBatch($initialData);
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
