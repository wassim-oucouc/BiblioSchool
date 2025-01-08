<?php
require_once("../../config/database.php");

class reservation extends DataBases
{
    private $id;
    private $Nom;
    private $status;

    public function __construct()
    {
    parent::connection();
    }

    public function create_reservation($nom,$status)
    {
        try
        {
            $ist = $this->connection->prepare("INSERT INTO reservation(Nom,status) VALUES(:nom,:status)");
            $ist->bindParam(':nom', $nom);
            $ist->bindParam(':status', $status);
            $ist->execute();

        echo "the reservation is added!";
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }
    }

    public function select_reservation($nom)
    {
        try
        {
            $ist = $this->connection->prepare("SELECT * FROM reservation where Nom = :nom");
            $ist->bindParam(':nom', $nom);
            $ist->execute();
            $ist->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }

    }
    public function edit_reservation($id,$nom,$status)
    {
        try
        {
            $edit = $this->connection->prepare("UPDATE reservation set Nom = :nom,status = :status where id = :id ");
            $edit->bindParam(':id',$id);
            $edit->bindParam(':nom',$nom);
            $edit->bindParam(':status',$status);
            $edit->execute();
            echo "reservation EDITED";
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }
        }

        public function update_status()
        {
            try
            {
                $edit = $this->connection->prepare("UPDATE reservation set status = :status where id = :id ");
                $edit->bindParam(':id',$id);
                $edit->bindParam(':nom',$status);
                $edit->execute();
                echo "reservation status EDITED";
            }
            catch(PDOException $error)
            {
                die($error->getMessage());
            }
        }

    public function delete_reservation($id)
    {
        try
        {
        $delete = $this->connection->prepare("DELETE FROM reservation WHERE ID_reservation = :id");
        $delete->bindParam(':id',$id);
        $delete->execute();
        echo "reservation Deleted";
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
        $select= $this->connection->prepare("SELECT * FROM reservation");
        $select->execute();
       var_dump($select->fetch(PDO::FETCH_ASSOC));
        }
           
        catch(PDOException $error)
    {
        echo("not fetched");
    }
}

public function findone($id)
{
    try
    {
    $findone = $this->connection->prepare("SELECT  * FROM reservation where  ID_reservation = :id");
    $findone->bindParam(':id',$id);
    $findone->execute();
    var_dump($findone->fetch(PDO::FETCH_ASSOC));

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


$newreservation = new reservation();

$newreservation->create_reservation("newbook","pending");

?>