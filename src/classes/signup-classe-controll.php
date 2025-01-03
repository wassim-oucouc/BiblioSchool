<?php
namespace App\src\classes;

use App\config\DataBase;

class SignupControll
{
    private $name;
    private $email;
    private $password;
    private $RepeatPassword;



    public function __construct($name,$email,$password,$RepeatPassword)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->RepeatPassword = $RepeatPassword;
    }



public function ValidateEmpty()
{
    $check;
    if(empty($this->name) || empty($this->email) || empty($this->password) || empty($this->RepeatPassword))
    {
        $check = false;
    }
    else
    {
        $check = true;
    }
    return $check;

}

public function ValidateName()
{
    $checkname;
    $nameregexexpression = "/^[a-z ,.'-]+$/i
";

    if(preg_match($nameregexexpression,$this->name))
    {
        $checkname = true;
    }
    else
    {
        $checkname = false;
    }
    return $checkname;
}

public function ValidateEmail()
{
    $checkemail;
    $regexexpressionemail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    ";

    if(preg_match($regexexpressionemail,$this->email))
    {
        $checkemail = true;
    }
    else
    {
        $checkemail = false;
    }
    return $checkemail;
}

public function ValidatePassword()
{
    $checkpassword;
    $regexexpressionpassword  = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
    ";


    if(preg_match($regexexpressionpassword,$this->password))
    {
        $checkpassword = true;
    }
    else
    {
        $checkpassword = false;
    }
    return $checkpassword;
}

public function ValidationPasswordRepeat()
{
    $checkpasswordrepeat;
    if($this->password == $this->RepeatPassword)
    {
        $checkpasswordrepeat = true;
    }
    else
    {
        $checkpasswordrepeat = false;
    }
    return $checkpasswordrepeat;
}


}



$test = new SignupControll("Wassim Oucouc","dkjdkd2@gmail.com","Passwr33222@@","Passwr33222@@");

// $test->emptyvalidate();
?>