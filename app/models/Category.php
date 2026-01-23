<?php

namespace app\models;

class Category{
    private ?int $id;
    private string $name;

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


    public function creatCategory(){
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $cnx = Database::getConnexion();
        $stmt = $cnx->prepare($sql);
        $stmt ->bindParam(':name', $name);
        $stmt->execute();
    }


    public function setter($body){
        $this->setName($body['name']);
    }

    public function save()
    {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $connexion = Database::getConnexion();
        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':name', $this->getName(), \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function find(): Category | bool
    {
        $sql = "SELECT * FROM categories WHERE name = :name";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':name', $this->getName(), \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Category::class);
        $stmt->execute();


        return $stmt->fetch();
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

    public function delete()
    {
        $sql = "DELETE FROM categories WHERE name = :name";
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