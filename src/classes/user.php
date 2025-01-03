<?php

include("../../config/database.php");

class User extends DataBase
{
    private $id;
    private $Nom;
    private $Email;
    private $Password;
    private $Role;

    public function __construct()
    {
    parent::connection();
    }

    public function create($nom,$email,$Password)
    {
        try
        {
            $ist = $this->connection->prepare("INSERT INTO users(Nom, Email, Password, Role) VALUES(:nom, :email, :password, 'Apprenant')");
            $ist->bindParam(':nom', $nom);
            $ist->bindParam(':email', $email);
            $ist->bindParam(':password', $Password);
            $ist->execute();
        echo "the user is added!";
        }
        catch(PDOException $error)
        {
            die("there a error");
            $error->getmessage();
        }
    }
    public function edit($id,$nom,$email,$password)
    {
        try
        {
            $edit = $this->connection->prepare("UPDATE USER set Nom = ':nom',email = ':email',password = ':password' WHERE id = ':id' ");
            $edit->bindParam(':nom',$nom);
            $edit->bindParam(':email',$email);
            $edit->bindParam(':password',$password);
            $edit->bindParam(':id',$id);
            $edit->execute();
            echo "USER EDITED";
        }
        catch(PDOException $error)
        {
            die("there a error");
            $error->getmessage();
        }
        }

    public function delete($id)
    {
        try
        {
        $delete = $this->connection->prepare("DELETE FROM users WHERE id = :id");
        $delete->bindParam(':id',$id);
        $delete->execute();
        echo "USER Deleted";
        }

    catch(PDOException $error)
    {
        die("there a error");
        $error->getmessage();
    }
}
    public function findAll()
    {
        try
        {
        $select_one= $this->connection->prepare("SELECT * FROM users");
        $select_one->execute();
        echo "the user selected!";
        }
        catch(PDOException $error)
    {
        die("there a error");
        $error->getmessage();
    }
}

public function findone($id)
{
    try
    {
    $findone = $this->connection->prepare("SELECT * FROM :id");
    $findone->bindParam(':id',$id);
    $edit->execute();
    echo "USER EDITED";
    }
    catch(PDOException $error)
    {
        die("there a error");
        $error->getmessage();
    }
}
    }

  
$newuser = new User();
$newuser->create("xxx","dssss","ddddss");
?>