<?php

namespace app\models;

class User
{
    private ?int $id = null;

    private string $firstname;

    private string $lastname;

    private string $email;

    private string $password;

    private bool $active;

    private string $joined;

    private string $role = 'user';




    /*Get the value of firstname*/
    public function getFirstname()
    {
        return $this->firstname;
    }

    /*Set the value of firstname*/
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /*Get the value of lastname*/
    public function getLastname()
    {
        return $this->lastname;
    }

    /*Set the value of lastname*/
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /*Get the value of email*/
    public function getEmail()
    {
        return $this->email;
    }

    /*Set the value of email*/
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /*Get the value of password*/
    public function getPassword()
    {
        return $this->password;
    }

    /*Set the value of password*/
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /*Get the value of role*/
    public function getRole()
    {
        return $this->role;
    }

    /*Set the value of role*/
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }



    /*Get the value of id*/
    public function getId()
    {
        return $this->id;
    }

    /*Set the value of id*/
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


        /**
     * Get the value of active
     */ 
    public function getActive() : bool
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of joined
     */ 
    public function getJoined()
    {
        return $this->joined;
    }

    /**
     * Set the value of joined
     *
     */ 
    public function setJoined($joined)
    {
        $this->joined = $joined;

        return $this;
    }


    
    public function getFullname() {
        $fname = $this->getFirstname();
        $lname = $this->getLastname();
        return "$fname $lname";
    }

    public function setters($body)
    {
        if (isset($body['firstname'])) {
            $this->setFirstname($body['firstname']);
        }
        if (isset($body['lastname'])) {
            $this->setLastname($body['lastname']);
        }
        $this->setEmail($body['email']);
        $this->setPassword($body['password']);

        if (isset($body['role'])) {
            $this->setRole($body['role']);
        }
    }

    public function save()
    {
        $sql = "INSERT INTO users (firstname, lastname, email, password, role) VALUES (:firstname, :lastname, :email, :password, :role)";
        $connexion = Database::getConnexion();
        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':firstname', $this->getFirstname(), \PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $this->getLastname(), \PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->getEmail(), \PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($this->getPassword(), PASSWORD_DEFAULT), \PDO::PARAM_STR);
        $stmt->bindValue(':role', $this->getRole(), \PDO::PARAM_STR);

        $stmt->execute();
    }

    public function find(): User | bool
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':email', $this->getEmail(), \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $stmt->execute();


        return $stmt->fetch();
    }

       public function findAll()
    {
        $sql = "SELECT * FROM users";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $stmt->execute();


        return $stmt->fetchAll();
    }

    public function delete()
    {
        $sql = "DELETE FROM users WHERE email = :email";
        $connexion = Database::getConnexion();

        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(':email', $this->getEmail(), \PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }
}
