<?php

namespace app\models;

class Orders{

    private int $id;
    private string $date;
    private float $total;
    private string $status;
    private string $address;


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
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

/*         public function setters($body)
    {
        $this->setAddress($body['address']);
        $this->setTotal($body);
        $this->setEmail($body['email']);
        $this->setPassword($body['password']);

        if (isset($body['role'])) {
            $this->setRole($body['role']);
        }
    }
 */
    public function save()
    {
        $sql = "INSERT INTO users (total, address) VALUES (:total, :address)";
        $connexion = Database::getConnexion();
        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':total', $this->getTotal(), \PDO::PARAM_INT);
        $stmt->bindValue(':address', $this->getAddress(), \PDO::PARAM_STR);

        $stmt->execute();
    }

    public function find(): Orders | bool
    {
        $sql = "SELECT * FROM orders WHERE address = :address";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':address', $this->getAddress(), \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Orders::class);
        $stmt->execute();


        return $stmt->fetch();
    }

        public function findAll()
    {
        $sql = "SELECT * FROM orders";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Orders::class);
        $stmt->execute();


        return $stmt->fetchAll();
    }

    public function delete()
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':id', $this->getID(), \PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

}