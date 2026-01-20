<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use Exception;

class AuthController extends Controller
{


    public function login(Request $request)
    {


        if ($request->getMethod() === 'post') {
            $login = new LoginController();
            try {
                $login->logIn();
                $role = $_SESSION['role'];
                return $this->render("$role-dashboard");
            } catch (Exception $e) {
                $e->getMessage();
                return $this->render('login');
            }
        } else {
            return $this->render('login');
        }


    }



    public function register(Request $request)
    {

        if ($request->getMethod() === 'post') {
            $register = new RegisterController();
            try {
                $register->registerUser();
                $role = $_SESSION['role'];
                return $this->render("$role-dashboard");
            } catch (Exception $e) {
                $e->getMessage();
                return $this->render('register');
            }
        } else {
            return $this->render('register');
        }
    }
}
