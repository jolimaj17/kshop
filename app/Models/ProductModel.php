<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','price','quantity','color'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name'=> 'required|is_unique[products.name]',
    ];
    protected $validationMessages   = [
        'name' => [
            'is_unique' => 'Sorry. That product name has already in the list.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    /**
     * This is for retrieving all Kpop Merchandize
     */
    public function getProducts(){
       return json_encode($this->findAll());
    }
    /**
     * This is for field validation
     */
    public function add_products()
    {
        $json = $this->request->getJSON();
        $data =[
            'name'=>$json->name,
            'price'=>$json->price,
            'quantity'=>$json->quantity,
            'color'=>$json->color
        ];
        return $this->insert($data);
    }
    public function update_products($id=null)
    {
        $json = $this->request->getJSON();
        $data =[
            'name'=>$json->name,
            'price'=>$json->price,
            'quantity'=>$json->quantity,
            'color'=>$json->color
        ];
        return $this->update($id,$data);
    }
    public function delete_products($id=null)
    {
        return $this->where('id', $id)->delete();
    }
}
