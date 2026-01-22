<?php

namespace app\controllers;

use app\core\Request;
use app\models\Category;
use app\models\Database;

class CategoryController
{

    public function addCategory()
    {
        $request = new Request();
        $body = $request->getBody();

        $category = new Category;
        $category->setter($body);
        $category->save();
    }


    public function findAll()
    {
        $sql = "SELECT * FROM categories";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Category::class);
        $stmt->execute();


        return $stmt->fetchAll();
    }
}
