<?php

namespace app\controllers;

use app\core\Request;
use app\models\User;
use Exception;

class RegisterController
{

    public function registerUser()
    {

        $user = new User();
        $request = new Request();
        $body = $request->getBody();
        if ($this->isValidPasswordSignUp($body)) {
            $user->setters($body);
        } else {
            return;
        }

        try {
            !$this->isValidname($user);
            $this->isValidEmailSignUp($user);
                
            
        } catch (\Exception $e) {
            $e->getMessage();
        }


        $user->save();
        $this->startSession($user);
    }

    private function isValidname(object $user): bool
    {
        $pattern = "/^(.*?)\s([\wáâàãçéêíóôõúüÁÂÀÃÇÉÊÍÓÔÕÚÜ]+\-?'?\w*\.?)$/u";

        if (preg_match($pattern, $user->getFirstname())) {
            throw new \Exception("firstname is not valid");
        } else if (preg_match($pattern, $user->getLastname())) {
            throw new \Exception("lastname is not valid");
        } else {
            return true;
        }
    }


    private function isValidEmailSignUp(object $user): bool
    {
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("email is not valid");
        }
        $object = $user->find();
        if (is_object($object)) {
            return true;
        } else {
            throw new \Exception("email already exists");
        }
    }

    private function isValidPasswordSignUp(array $body): bool
    {
        if ($body['password'] === $body['confirmPassword']) {
            return true;
        } else {
            throw new \Exception("passwords are not matching");
        }
    }

    private function startSession($user)
    {
        session_start();
        session_regenerate_id(true);
        $_SESSION['email']  = $user->getEmail();
        $_SESSION['role'] = $user->getRole();
        $_SESSION['logged_in'] = true;
    }
}
