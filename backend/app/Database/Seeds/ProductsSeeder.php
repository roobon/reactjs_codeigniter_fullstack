<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'product_name' => 'Black Jacket',
                'product_details'    => 'Jacket details',
                'product_price'    => '2000',
                'product_category'    => 1,
            ],
            [
                'product_name' => 'Red Jacket',
                'product_details'    => 'Jacket details',
                'product_price'    => '2500',
                'product_category'    => 1,

            ],
            [
                'product_name' => 'Green Jacket',
                'product_details'    => 'Jacket details',
                'product_price'    => '3500',
                'product_category'    => 1,
            ],
            [
                'product_name' => 'Brown Jacket',
                'product_details'    => 'Jacket details',
                'product_price'    => '4500',
                'product_category'    => 2,
            ],
            [
                'product_name' => 'Green Shirt',
                'product_details'    => 'Shirt details',
                'product_price'    => '1500',
                'product_category'    => 1,
            ],
            [
                'product_name' => 'White Shirt',
                'product_details'    => 'Shirt details',
                'product_price'    => '1500',
                'product_category'    => 1,
            ],
            [
                'product_name' => 'Black Shirt',
                'product_details'    => 'Shirt details',
                'product_price'    => '1500',
                'product_category'    => 1,
            ],
            [
                'product_name' => 'Red Shirt',
                'product_details'    => 'Shirt details',
                'product_price'    => '1500',
                'product_category'    => 2,
            ],
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        foreach ($datas as $data) {
            $this->db->table('products')->insert($data);
        }
    }
}
