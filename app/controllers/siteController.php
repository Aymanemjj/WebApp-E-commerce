<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;


class siteController extends Controller
{

    public function home()
    {
        return $this->render('home');
    }


    public function admin_dashboard()
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

    public function admin_products()
    {
        return $this->renderAdmin('/admin-products');
    }

    public function admin_charts()
    {
        return $this->renderAdmin('/admin-charts');
    }

    public function admin_users()
    {
        return $this->renderAdmin('/admin-users');
    }

    public function admin_orders()
    {
        return $this->renderAdmin('/admin-orders');
    }
}
