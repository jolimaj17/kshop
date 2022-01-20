<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

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
    public function create(){
        return view('product');
    }
    public function store() {
        $json = $this->request->getJSON();
        $data = [
            'name'=>$json->name,
            'price'=>$json->price,
            'quantity'=>$json->quantity,
            'color'=>$json->color
        ];
        return $this->productModel->insert($data);
        //$products=$this->productModel->add_products();
    }
    public function update() {
       
        $products=$this->productModel->update_products();
    }
    public function delete() {
      return $this->productModel->delete_products();
    }
}
