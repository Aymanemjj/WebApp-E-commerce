<?php

namespace app\controllers;

use app\core\Request;
use app\models\User;
use Exception;
use app\controllers\sessionController;

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
        sessionController::startSession($user);
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
            throw new \Exception("email already exists");
        } else {
            return true;
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


}
