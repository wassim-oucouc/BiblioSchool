<?php

include(".././config/database.php");

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
            $hashed_password = password_hash($Password, PASSWORD_DEFAULT, ['cost' => 12]);
            $ist->bindParam(':password', $hashed_password);
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
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $ist->bindParam(':password', $hashed_password);
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

public function setid($id)
{
    $this->id = $id;
}

public function getid()
{
    return $this->id;
}

public function setnom($nom)
{
    $this->nom = $nom;
}

public function getnom()
{
    return $this->nom;
}

public function getemail()
{
    return $this->email;
}

public function setemail($email)
{
    $this->email = $email;
}

public function setpassword($password)
{
    $this->Password = $password;
}

public function getpassword()
{
   return $this->Password;
}

public function setrole($role)
{
    $this->Role = $role;
}

public function getrole()
{
    return $this->Role;
}

// public function __tostring()
// {
//     echo "id : " . $this->id .":name" . $this-> Nom . "Email:" . $this->Email . "password:" . $this->Password "role :" . $this->Role;
// }
    }

  
$newuser = new User();
$newuser->create("soso","fofo","bibi");
?>