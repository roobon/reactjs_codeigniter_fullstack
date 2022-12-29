<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                'type' => "INT",
                'constraint' => 12,
                'auto_increment' => true
            ],
            "cat_name" => [
                'type' => "VARCHAR",
                'constraint' => 50,
                'null' => false,
            ],
        ]);
        $this->forge->addKey("id", true);
        $this->forge->createTable("categories");
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
