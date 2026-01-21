<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use Exception;
use Locale;

class AuthController extends Controller
{


    public function login(Request $request)
    {


        if ($request->getMethod() === 'post') {
            $login = new LoginController();
            try {
                $login->logIn();
                $role = $_SESSION['role'];
                if ($role === 'admin') {
                    return header("Location: /admin-dashboard");
                }
                return header("Location: /");
            } catch (Exception $e) {
                $e->getMessage();
                return header("Location: /login");
            }
        } else {
            return header("Location: /login");
        }


    }



    public function register(Request $request)
    {

        if ($request->getMethod() === 'post') {
            $register = new RegisterController();
            try {
                $register->registerUser();
                return header("Location: /");
            } catch (Exception $e) {
                $e->getMessage();
                return $this->render('register');
            }
        } else {
            return $this->render('register');
        }
    }
}
