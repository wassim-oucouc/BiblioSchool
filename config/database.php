<?php
//  define('PROJECT_ROOT', dirname(dirname(dirname(__DIR__ . '/..'))));

//  require_once PROJECT_ROOT . '/vendor/autoload.php';
// namespace App\DataBase;
class DataBase{
    private $dsn = "mysql:host=localhost;dbname=biblioschool;charset=UTF8";
    private $username = "root";
    private $password = "";
    protected $connection;

    public function connection()
    {
    try
    {
    $this->connection = new PDO($this->dsn,$this->username,$this->password);
    $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "database connected!";
    return $this->connection;
    }
    catch(PDOEXCEPTION $error)
    {
        die("There was an error: " . $error->getMessage());
    }
}


public function __toString() {
    // Return a string representation of the object, e.g., a connection status or similar
    return "Database connection object";
}
}


$newdata = new DataBase();





?>