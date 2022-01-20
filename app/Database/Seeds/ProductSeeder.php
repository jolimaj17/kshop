<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'name'=>'STAYDIUMLA',
                'price'=>2000.00,
                'quantity'=>20,
                'color'=>'Blue'
            ],
            [
                'name'=>'RDVZ',
                'price'=>2000.00,
                'quantity'=>200,
                'color'=>'Red'
            ],
            [
                'name'=>'Tempus Studio',
                'price'=>500.00,
                'quantity'=>200,
                'color'=>'Black'
            ],
        ];
        $this->db->table('products')->insert($data);
    }
}
