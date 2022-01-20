<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        //
        $data=[
            'name'=>'STAYDIUMLA',
            'price'=>20.00,
            'quantity'=>20,
            'color'=>'Blue'
        ];
        $this->db->table('products')->insert($data);
    }
}
