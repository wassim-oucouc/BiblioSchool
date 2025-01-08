<?php

require(".././config/database.php");

class User extends DataBases
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
            die($error->getMessage());
        }
    }

    public function selectemail($email)
    {
        try
        {
            $ist = $this->connection->prepare("SELECT * FROM users where email = :email");
            $ist->bindParam(':email', $email);
            $ist->execute();
            $ist->fetch(PDO::FETCH_ASSOC);
        echo "the user is added!";
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }

    }
    public function edit($id,$nom,$email,$password)
    {
        try
        {
            $edit = $this->connection->prepare("UPDATE users set Nom = :nom,Email = :email,Password = :password WHERE id = :id ");
            $edit->bindParam(':nom',$nom);
            $edit->bindParam(':email',$email);
            $edit->bindParam(':password', $password);
            $edit->bindParam(':id',$id);
            $edit->execute();
            echo "USER EDITED";
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }
        }

    public function delete($id)
    {
        try
        {
        $delete = $this->connection->prepare("DELETE FROM users WHERE ID_USER = :id");
        $delete->bindParam(':id',$id);
        $delete->execute();
        echo "USER Deleted";
        }

    catch(PDOException $error)
    {
        die($error->getMessage());
    }
}
    public function findAll()
    {
        try
        {
        $select_one= $this->connection->prepare("SELECT * FROM users");
        $select_one->execute();
        return $select_one->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $error)
    {
        die($error->getMessage());
    }
}

public function findone($id)
{
    try
    {
    $findone = $this->connection->prepare("SELECT  * FROM users where id = :id");
    $findone->bindParam(':id',$id);
    $findone->execute();
    return $findone->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $error)
    {
        die($error->getMessage());
    }
}

public function countusers()
{
    try
    {
    $findone = $this->connection->prepare("SELECT  COUNT(*) FROM  users");
    $findone->execute();
    return $findone->fetchcolumn();
    }
    catch(PDOException $error)
    {
        die($error->getMessage());
    }
}

public function count_users_apprenant()
{
    try
    {
    $findone = $this->connection->prepare("SELECT  COUNT(*) FROM  users where Role = 'Apprenant'");
    $findone->execute();
    return $findone->fetchcolumn();
    }
    catch(PDOException $error)
    {
        die($error->getMessage());
    }
}

public function count_users_gerant()
{
    try
    {
    $findone = $this->connection->prepare("SELECT  COUNT(*) FROM  users where Role = 'Gerant'");
    $findone->execute();
    return $findone->fetchcolumn();
    }
    catch(PDOException $error)
    {
        die($error->getMessage());
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


    }

  

?>