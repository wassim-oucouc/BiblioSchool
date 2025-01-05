<?php

include("../../src/classes/user.php");


class gerant extends user
{
   

  

    public function track_reservation($id)
    {
        try
        {
            $ist = $this->connection->prepare("SELECT status from reservation where ID_reservation = :id");
            $ist->bindParam(':id', $id);
            $ist->execute();
            var_dump($ist->fetch(PDO::FETCH_ASSOC));
        echo "the reservation is selected!";
        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }
    }

    public function validation_reservation($id)
    {
        try
        {
            $ist = $this->connection->prepare("UPDATE reservation set status = 'Valider' where ID_reservation = :id ");
            $ist->bindParam(':id', $id);
            $ist->execute();        }
        catch(PDOException $error)
        {
            die($error->getMessage());
        }

    }
    public function reject_reservation($id)
    {
        try
        {
            $edit = $this->connection->prepare("UPDATE reservation set status = 'rejeter' where ID_reservation = :id");
            $edit->bindParam(':id',$id);
            $edit->execute();
            echo "reservation rejected";
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


$newvalidated = new gerant();

$newvalidated->delete_reservation(2);


?>

