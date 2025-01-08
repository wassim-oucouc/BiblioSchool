<?php
  session_start();
require_once(".././src/classes/user.php");
class authy extends User
{
    public function checkemail($email)
    {
        try
        {
            $query = $this->connection->prepare("SELECT COUNT(*) from users where Email = :email");
            $query->bindParam(':email',$email);
            $query->execute();
      $count  =  $query->fetchcolumn();
       
        if($count > 0)
        {
           return "the email is already registered";
        }
        else
        {
            return "the email not registred";
        }
        }
        catch(PDOexception $e)
        {
            die($e->getmessage());
        }
    }
    public function checkuser($email,$password)
{
    $query = $this->connection()->prepare("SELECT * FROM users WHERE Email = :email AND Password = :password");
    $query->bindParam(':email',$email);
    $query->bindparam(':password',$password);
   $query->execute();
   $result = $query->fetch(PDO::FETCH_ASSOC);

   if($email == $result['Email'] && $password == $result['Password'])
   {
    if($result['Role'] == 'Apprenant')
    {
        $_SESSION['id'] = $result['ID_USER'];
        $_SESSION['Email'] = $result['Email'];
        $_SESSION['Nom'] = $result['Nom'];
        $_SESSION['role'] = "Apprenant";
        
      
        
        header('Location: redirect-apprenant.php');

    }
    else if($result['Role'] == 'Admin')
    {
        $_SESSION['id'] = $result['ID_USER'];
        $_SESSION['Email'] = $result['Email'];
        $_SESSION['Nom'] = $result['Nom'];
        $_SESSION['role'] = "Admin";
        $_SESSION['image'] = $result['Photo'];


        header('Location: redirect-admin.php');
    }
    else if($result['Role'] == 'Gerant')
    {
        $_SESSION['id'] = $result['ID_USER'];
        $_SESSION['Email'] = $result['Email'];
        $_SESSION['Nom'] = $result['Nom'];
        $_SESSION['role'] = "Gerant";


        header('Location: redirect-gerant.php');
    }
   }


}
}







?>