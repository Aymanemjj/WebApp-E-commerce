<?php

namespace app\controllers;

use app\controllers\ProductController;
use app\models\Category;
use app\models\Orders;
use app\models\Product;
use app\models\User;

class AdminController
{



    public function switch()
    {
        switch ($_POST['submit']) {
            case 'newProduct':
                $productController = new ProductController;
                $productController->addProduct();
                break;

            case 'newCategory':
                $categoryController = new CategoryController;
                $categoryController->addCategory();
                break;
        }
        
        return ;
    }

    public function showProducts(){
        $product = new Product;
        return $product->findAll();
    }

    public function showCategorys(){
        $category = new Category;
        return $category->findAll();
    }

    public function showUsers(){
        $user = new User;
        return $user->findAll();
    }

    public function showOrders(){
        $order = new Orders;
        return $order->findAll();
    }
}
