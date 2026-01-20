<?php

namespace app\controllers;


class logoutController{

    public static function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 3600);

        header("Location: /home");
        exit;
    }

}