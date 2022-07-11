<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductInventory extends Migration
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
            'quantity' => [
                'type'           => 'INT',
                'constraint'     => 11,
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
        $this->forge->createTable('product_inventory');
    }

    public function down()
    {
        $this->forge->dropTable('product_inventory');
    }
}
