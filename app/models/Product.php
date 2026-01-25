<?php

namespace app\models;

class Product
{

    private ?int $id;
    private string $name;
    private string $description;
    private float $price;
    private int $stock;
    private string $category;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }


    public function setter($body)
    {
        $this->setName($body['name']);
        $this->setCategory($body['category']);
        $this->setPrice($body['price']);
        $this->setDescription($body['description']);
        $this->setStock($body['stock']);
    }

    public function save()
    {
        $sql = "INSERT INTO products (name, description, price, stock, category) VALUES (:name, :description, :price, :stock, :category)";
        $connexion = Database::getConnexion();
        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':name', $this->getName(), \PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->getDescription(), \PDO::PARAM_STR);
        $stmt->bindValue(':price', $this->getPrice(), \PDO::PARAM_INT);
        $stmt->bindValue(':stock', $this->getStock(), \PDO::PARAM_INT);
        $stmt->bindValue(':category', $this->getCategory(), \PDO::PARAM_STR);

        $stmt->execute();
    }

    public function find(): Product | bool
    {
        $sql = "SELECT products.id,products.name,products.description,products.price,products.stock,categories.name AS category FROM products INNER JOIN categories ON products.category = categories.id WHERE products.id = :id";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':id', $this->getId(), \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Product::class);
        $stmt->execute();


        return $stmt->fetch();
    }

    public function findAll()
    {
        $sql = "SELECT products.id,products.name,products.description,products.price,products.stock,categories.name AS category FROM products INNER JOIN categories ON products.category = categories.id";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Product::class);
        $stmt->execute();


        return $stmt->fetchAll();
    }

    public function delete()
    {
        $sql = "DELETE FROM products WHERE name = :name";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':name', $this->getName(), \PDO::PARAM_STR);

        try {
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
