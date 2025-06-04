<?php

require_once 'config/database.php';

class Usuario {
    private $conn;
    private $table = 'usuarios';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function criar($nome, $email, $senha) {
        $sql = "INSERT INTO $this->table (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        return $stmt->execute([$nome, $email, $senhaHash]);
    }

    public function autenticar($email) {
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
