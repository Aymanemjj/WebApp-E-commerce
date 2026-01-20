<?php

namespace app\controllers;
use app\models\User;

class sessionController{


    public static function startSession(User $user){
        session_start();
        session_regenerate_id(true);
        $_SESSION['fullname'] = $user->getFullname();
        $_SESSION['email']  = $user->getEmail();
        $_SESSION['role'] = $user->getRole();
        $_SESSION['logged_in'] = true;
    }


    public static function endSession()
    {
        session_start();
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 3600);

        header("Location: /");
        exit;
    }

}


