<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'cat_name' => 'Electronics'

            ],
            [
                'cat_name' => 'Mobile'

            ],
            [
                'cat_name' => 'Camera'
            ],
            [
                'cat_name' => 'Television'
            ],
            [
                'cat_name' => 'Hard Disk'
            ],
            [
                'cat_name' => 'Monitor'
            ],
            [
                'cat_name' => 'Keyboard'
            ],
            [
                'cat_name' => 'Power Supply'
            ],
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        foreach ($datas as $data) {
            $this->db->table('categories')->insert($data);
        }
    }
}
