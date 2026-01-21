<?php

namespace app\models;

class AdminController
{

    public function creatCategory($name)
    {
        $category = new Category;
        $category->creatCategory($name);
    }
}
