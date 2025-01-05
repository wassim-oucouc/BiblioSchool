<?php
include("../../src/classes/user.php");


class administrator extends user
{
    public function ajoute_role($id,$role)
    {
        try
        {
            $role = $this->connection->prepare("UPDATE users set role = :role where id = :id");
            $role->bindparam(':id',$id);
            $role->bindparam(':role',$role);
            $role->execute();
        }
        catch(PDOexception $e)
        {
            die($e->getmessage());
        }
    }

public function update_tag($id,$tag)
{
    try
    {
        $tag = $this->connection->prepare("UPDATE livre set Tag = :tag where ID_livre = :id");
        $tag->bindparam(':id',$id);
        $tag->bindparam(':tag',$tag);
        $tag->execute();
    }
    catch(PDOexception $e)
    {
        die($e->getmessage());
    }

}

public function delete_role($id)
{
    try
    {
        $tag = $this->connection->prepare("UPDATE users set role = NULL where ID_USER = :id ");
        $tag->bindparam(':id',$id);
        $tag->execute();
    }
    catch(PDOexception $e)
    {
        die($e->getmessage());
    }
}

public function create_tag($id,$tag)
{
    try
    {
        $tag = $this->connection->prepare("UPDATE livre set tag = :tag where ID_livre = :id");
        $tag->bindparam(':id',$id);
        $tag->bindparam(':tag',$tag);
        $tag->execute();
    }
    catch(PDOexception $e)
    {
        die($e->getmessage());
    }
}

public function delete_tag($id)
{
    $tag = $this->connection->prepare("UPDATE livre set tag = NULL where ID_livre = :id");
    $tag->bindparam(':id',$id);
    $tag->execute();
}
}


$livre = new administrator();
$livre->delete_tag(5);

?>