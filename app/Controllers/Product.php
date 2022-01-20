<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
class Product extends BaseController
{
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }
    public function index()
    {                
        return view('UI/index');
    }
    public function display()
    {    
       return $this->productModel->getProducts();        
    }
    public function store() {
        $json = $this->request->getJSON();
        $data =[
            'name'=>$json->name,
            'price'=>$json->price,
            'quantity'=>$json->quantity,
            'color'=>$json->color
        ];
        return $this->productModel->insert($data);
    }
    public function update($id) {
        $json = $this->request->getJSON();
        $data =[
            'name'=>$json->name,
            'price'=>$json->price,
            'quantity'=>$json->quantity,
            'color'=>$json->color
        ];
        return $this->productModel->update($id,$data);
    }
    public function delete($id) {
        return $this->productModel->delete($id);
    }
}
