<?php

class categorie extends DataBase
{
    private $id;
    private $Nom;

    public function __construct()
    {
    parent::connection();
    }

    public function create_categorie($nom)
    {
        try
        {
            $ist = $this->connection->prepare("INSERT INTO categorie(Nom) VALUES(:nom)");
            $ist->bindParam(':nom', $nom);
            $ist->execute();
        echo "the categorie is added!";
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }
    }

    public function selectcategorie($nom)
    {
        try
        {
            $ist = $this->connection->prepare("SELECT * FROM categorie where nom = :nom");
            $ist->bindParam(':nom', $nom);
            $ist->execute();
            $ist->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }

    }
    public function edit_categorie($nom)
    {
        try
        {
            $edit = $this->connection->prepare("UPDATE categorie set nom = :nom where id = :id ");
            $edit->bindParam(':nom',$nom);
            $edit->bindParam(':id',$id);
            $edit->execute();
            echo "categorie EDITED";
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
        $delete = $this->connection->prepare("DELETE FROM categorie WHERE id = :id");
        $delete->bindParam(':id',$id);
        $delete->execute();
        echo "categorie Deleted";
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
        $select_one= $this->connection->prepare("SELECT * FROM categorie");
        $select_one->execute();
        return $select_one->fetchAll(PDO::FETCH_ASSOC);
        echo "the categories selected!";
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
    $findone = $this->connection->prepare("SELECT categorie * FROM where id = :id");
    $findone->bindParam(':id',$id);
    $findone->execute();
    return $findone->fetch(PDO::FETCH_ASSOC);
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
    $this->Nom = $nom;
}

public function getnom()
{
    return $this->Nom;
}

}


?>