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
        return $this->render('/admin-products');
    }
}
