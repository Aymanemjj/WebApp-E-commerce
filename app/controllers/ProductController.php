<?php

namespace app\controllers;

use app\core\Request;
use app\models\Database;
use app\models\Product;

class ProductController{


    public function addProduct(){
        $request = new Request();
        $body = $request->getBody();

        $product = new Product;
        $product->setter($body);
        $product->save();
    }

    public function productDetails(){
        
    }

     
}