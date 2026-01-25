<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Product;
use Exception;

class siteController extends Controller
{

    public function home()
    {
        $products = new Product;
        $products = $products->findAll();
        $params = [
            "products" => $products
        ];
        return $this->render('home', $params);
    }

    public function cartPage()
    {
        return $this->render('cart');
    }


    public function adminDashboard()
    {
        return $this->renderAdmin('admin-dashboard');
    }

    public function error401()
    {
        return $this->render(401);
    }

    public function contactView()
    {
        return $this->render('/contact');
    }


    public function handleContact(Request $request)
    {
        $body = $request->getBody();
    }

    public function logOut()
    {
        sessionController::endSession();
    }

    public function login()
    {
        return $this->render('/login');
    }
    public function register()
    {
        return $this->render('/login');
    }

    public function adminProducts()
    {
        return $this->renderAdmin('/admin-products');
    }

    public function adminCharts()
    {
        return $this->renderAdmin('/admin-charts');
    }

    public function adminUsers()
    {
        return $this->renderAdmin('/admin-users');
    }

    public function adminOrders()
    {
        return $this->renderAdmin('/admin-orders');
    }


    public function productDetails()
    {
        $request = new Request();
        $body = $request->getBody();
        $product = new Product;
        $product->setId($body['id']);
        $product = $product->find();
        $params = [
            "product" => $product
        ];

        return $this->render('/product-details', $params);
    }

    public function addToCart()
    {
        $request = new Request;
        $body = $request->getBody();
        $product = new Product();
        $product->setId($body['addToCart']);
        $product = $product->find();
        $stock = $product->getStock();
        $id = $product->getId();
        if ($stock == 0) {
            throw new Exception("No stock");
        } else if ($stock < $body['quantity']) {
            var_dump($product);
            throw new Exception("Not enough stock only $stock left");
        }

        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'quantity' => $body['quantity'],
            'total' => $product->getPrice() * $body['quantity']
        ];
        $stock = $stock - $body['quantity'];
        $product->setStock($stock);
        $product->updateStock();

        var_dump($_SESSION);
    }
}
