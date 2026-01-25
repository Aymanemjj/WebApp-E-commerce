<?php

namespace app\controllers;

use app\core\Request;
use app\models\User;
use Exception;

class LoginController{


    public function logIn(){
        $request = new Request();
        $body = $request->getBody();

        try {
            $this->isValidEmailSignUp($body);
        } catch (Exception $e) {
            $e->getMessage();
            return;
        } 

        $user = new User();
        $user->setters($body);
        try {
            $this->userExists($user);
        } catch (Exception $e) {
            $e->getMessage();
            return;
        }

        $object = $user->find();
        sessionController::startSession($object);
        

    }




    private function isValidEmailSignUp($body): bool
    {
        if (!filter_var($body['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("email is not valid");
        }
        return true;
    }

    private function userExists($user){
        $object = $user->find();
        if (!is_object($object)) {
            throw new \Exception("Email or password are wrong");
            return;
        }

        if (!password_verify($user->getPassword(), $object->getPassword())) {
            throw new Exception('Email or password are wrong');
        }
        return true;

    }



}