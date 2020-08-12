<?php
class connection{
    private $dsn="mysql:host=localhost;dbname=picpoint";
    private $username="root";
    private $pass="";
    public $pdo;
    public function __construct()    
    {
        if(!isset($this->pdo))
        {
            try
            {
                $this->pdo=new PDO($this->dsn,$this->username,$this->pass);
            }
                catch(PDOExecption $e)
            {
                echo $e->getMessage();
            }
        }
    }
}



?>