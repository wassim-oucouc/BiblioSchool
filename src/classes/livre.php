<?php

require_once("../../config/database.php");


class Livre extends DataBases
{
    private $id;
    private $Nom;
    private $Auteur;
    private $Tag;
    private $categorie;
    private $DateCreation;

    public function __construct()
    {
    parent::connection();
    }

    public function create($nom,$Auteur,$Tag,$categorie)
    {
        try
        {
            $categorieStmt = $this->connection->prepare("INSERT INTO categorie(NOM) VALUES(:NOM_CATEGORIE)");
            $categorieStmt->bindParam(':NOM_CATEGORIE', $categorie);
            $categorieStmt->execute();
            
            $lastCategorieId = $this->connection->lastInsertId();
            
            $livreStmt = $this->connection->prepare("INSERT INTO livre(nom, Auteur, Tag, ID_CATEGORIE) VALUES(:nom, :auteur, :tag, :id_categorie)");
            $livreStmt->bindParam(':nom', $nom);
            $livreStmt->bindParam(':auteur', $Auteur);
            $livreStmt->bindParam(':tag', $Tag);
            $livreStmt->bindParam(':id_categorie', $lastCategorieId); 
            $livreStmt->execute();
        echo "the livre is added!";
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }
    }

    public function selectlivre($id)
    {
        try
        {
            $ist = $this->connection->prepare("SELECT * FROM livre where ID_LIVRE = :id");
            $ist->bindParam(':id', $id);
            $ist->execute();
            $ist->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }

    }
    public function edit($id,$nom,$auteur,$tag,$categorie)
    {
        try
        {
            $edit = $this->connection->prepare("UPDATE livre set nom = :nom,auteur = :auteur,tag = :tag,categorie = :categorie WHERE ID_LIVRE = :id ");
            $edit->bindParam(':nom',$nom);
            $edit->bindParam(':auteur',$auteur);
            $edit->bindParam(':tag', $tag);
            $edit->bindParam(':categorie', $categorie);
            $edit->bindParam(':id',$id);
            $edit->execute();
            echo "book EDITED";
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
        $delete = $this->connection->prepare("DELETE FROM livre WHERE ID_LIVRE = :id");
        $delete->bindParam(':id',$id);
        $delete->execute();
        echo "book Deleted";
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
        $select_one= $this->connection->prepare("SELECT * FROM livre");
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
    $findone = $this->connection->prepare("SELECT livre * FROM where ID_LIVRE = :id");
    $findone->bindParam(':id',$id);
    $findone->execute();
    return $findone->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $error)
    {
        die($error->getMessage());
    }
}

public function setnom($nom)
{
     $this->Nom = $nom;
}
public function getnom()
{
    return $this->Nom;
}
public function setauteur($auteur)
{
   $this->Auteur = $auteur;
}

public function settag($tag)
{
    $this->Tag;
}
public function gettag()
{
   return  $this->Tag;
}

public function setcategorie($categorie)
{
    $this->categorie = $categorie;
}

public function getcategorie()
{
    return $this->categorie;
}
public function __tostring()
{
    echo "id : " . $this->id ."name:" . $this-> Nom . "auteur:" . $this->Auteur . "categorie:" . $this->categorie . "tag:" . $this->tag;
}
} 

$newlivre = new livre();
$newlivre->create("hdhdhd","jdjdhdjd","djdjdjd","jdjdjdd");

?>