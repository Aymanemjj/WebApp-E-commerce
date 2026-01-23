<?php

namespace app\controllers;

use app\models\Database;
use app\models\Orders;

class OrderController{

        public function findAll()
    {
        $sql = "SELECT * FROM orders";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Orders::class);
        $stmt->execute();


        return $stmt->fetchAll();
    }
}