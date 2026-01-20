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
}
