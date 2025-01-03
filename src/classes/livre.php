<?php

include("../../config/database.php");

class Livre extends DataBase
{
    private $id
    private $Nom;
    private $Auteur;
    private $Tag;
    private $categorie;
    private $DateCreation;

    public function __construct()
    {
    parent::connection();
    }

    public function create($nom,$auteur,$tag,$categorie)
    {
        try
        {
            $ist = $this->connection->prepare("INSERT INTO users(nom, Auteur, Tag,categorie) VALUES(:nom, :Auteur, :categorie,:Tag)");
            $ist->bindParam(':nom', $Nom);
            $ist->bindParam(':Auteur', $auteur);
            $ist->bindParam(':categorie', $categorie);
            $ist->bindParam(':Tag', $Tag);
            $ist->execute();
        echo "the livre is added!";
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
        $select_one= $this->connection->prepare("SELECT * FROM livre");
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
    $findone = $this->connection->prepare("SELECT * FROM livre where = :id");
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
    $this->id = $id
}

public function getid()
{
    return $this->id;
}

public function setnom($nom)
{
    $this->Nom = $nom;
}

public function getnom()
{
    return $this->Nom;
}

public function getauteur()
{
    return $this->Auteur;
}

public function setauteur($auteur)
{
    $this->email = $auteur;
}

public function settag($tag)
{
    $this->Tag = $tag;
}

public function gettag()
{
   return $this->Tag;
}

public function setcategorie($categorie)
{
    $this->categorie = $categorie;
}

public function setcategorie()
{
    return $this->categorie;
}
public function getdatecreation()
{
    return $this->DateCreation;
}
public function setdatecreation($date)
{
   $this->DateCreation = $date;
}
public function __tostring()
{
    echo "id : " . $this->id .":name" . $this-> Nom . "auteur:" . $this->Auteur . "categorie:" . $this->categorie "tag :" . $this->tag;
}
} 



?>