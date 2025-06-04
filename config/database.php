<?php

class database{
    private $host = "localhost";
    private $db_name = "clinica";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception){
            echo "Erro na conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>