<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Discount extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'desc' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'discount_percent' => [
                'type'           => 'DECIMAL',
                'constraint'     => 2,
            ],
            'active' => [
                'type'           => 'BOOLEAN',
                'null'           => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'modified_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('discount');
    }

    public function down()
    {
        $this->forge->dropTable('discount');
    }
}
