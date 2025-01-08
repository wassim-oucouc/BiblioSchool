<?php
require_once("../../src/classes/user.php");


class apprenant extends user
{
    public function create_reservation($nom)
    {
        try
        {
    $ist = $this->connection->prepare("INSERT INTO reservation(Nom,status) VALUES(:nom,'en attent')");
    $ist->bindParam(':nom', $nom);
    $ist->execute();
echo "the reservation is added!";
    }
    catch(PDOexception $e)
    {
        die($e->getmessage());
    }
}

public function annulation_reservation($id)
{
    try
        {
        $delete = $this->connection->prepare("DELETE FROM reservation WHERE ID_reservation = :id");
        $delete->bindParam(':id',$id);
        $delete->execute();
        echo "reservation annuler";
        }

    catch(PDOException $error)
    {
        die($error->getMessage());
    }
}

public function historique_reservation()
{
    try
    {
        $histo = $this->connection->prepare("SELECT * FROM reservation");
        $histo->execute();
        $histo->fetch(PDO::FETCH_ASSOC);

    }
    catch(PDOexception $e)
    {
        die($e->getmessage());
    }
}
}


?>