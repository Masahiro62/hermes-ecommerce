<!-- connect to database -->
<?php 
class config{
    private $servername='localhost';
    private $username='root';
    private $password='root';
    private $db_name='hermes';
    public $conn;

    public function __construct()
    {
        $this->conn= new mysqli($this->servername,$this->username,$this->password,$this->db_name);
        return $this->conn;
    }


}

?>