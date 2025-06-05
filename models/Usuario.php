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

    public function atualizar($user_id, $nome, $email, $senha) {
        if ($senha) {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "UPDATE $this->table SET nome = ?, email = ?, senha = ? WHERE usuario_id = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$nome, $email, $senhaHash, $user_id]);
        }
    }

    public function autenticar($email) {
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
