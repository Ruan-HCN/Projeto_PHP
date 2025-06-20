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

    public function deletar($user_id, $senha){
        $sqlBuscaHash = "SELECT senha FROM usuarios WHERE usuario_id = ?";
        $stmtBuscaHash = $this->conn->prepare($sqlBuscaHash);
        $stmtBuscaHash->execute([$user_id]);
        $resultado = $stmtBuscaHash->fetch(PDO::FETCH_ASSOC);

        if ($resultado && isset($resultado['senha'])) {
            $senhaHashArmazenada = $resultado['senha'];

            if (password_verify($senha, $senhaHashArmazenada)) {
                $sqlDeletar = "DELETE FROM usuarios WHERE usuario_id = ?";
                $stmtDeletar = $this->conn->prepare($sqlDeletar);

                return $stmtDeletar->execute([$user_id]); 
            } else {

                return false;
            }
        } else {
            
            return false;
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
