<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $products=[
            'id'=>[
                'type'=>'INT',
                'constraint'=>5,
                'auto_increment'=>true,
                
            ],
            'name'=>[
                'type'=>'VARCHAR',
                'constraint'=>200,
                'unique' => true
            ],
            'price'=>[
                'type'=>'INT',
                'constraint'=>11,
                
            ],
            'quantity'=>[
                'type'=>'INT',
                'constraint'=>11,
                 
            ],
            'color'=>[
                'type'=>'VARCHAR',
                'constraint'=>50,
            ],
        ];
        $this->forge->addField($products);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products',true);
    }

    public function down()
    {
        //
    }
}
