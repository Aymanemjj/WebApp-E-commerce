<?php

namespace app\controllers;

use app\controllers\ProductController;

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
        return header("Location : /admin-products");
    }
}
