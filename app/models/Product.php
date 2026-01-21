<?php

namespace app\models;

class Product{

    private ?int $id;
    private string $name;
    private string $description;
    private float $price;
    private int $stock;
    private Category $category;
}