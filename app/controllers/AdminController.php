<?php

namespace app\controllers;

use app\controllers\ProductController;
use app\core\Controller;
use app\models\Category;
use app\models\Orders;
use app\models\Product;
use app\models\User;

class AdminController extends Controller
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
        $products = $product->findAll();
        $categories = $this->showCategorys();
        $params = [
            "products" => $products,
            "categories" => $categories
        ];
        return $this->renderAdmin("/admin-products", $params);

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
