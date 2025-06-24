<?php

require_once 'config/database.php';

class Consulta {
    private $conn;
    private $table = 'consultas';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // 🔍 Lista apenas as consultas do usuário logado
    public function listarPorUsuario($usuario_id) {
        $sql = "SELECT * FROM $this->table WHERE usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔍 Busca uma consulta específica por ID e usuário
    public function buscarPorId($consulta_id, $usuario_id) {
        $sql = "SELECT * FROM $this->table WHERE consulta_id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$consulta_id, $usuario_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Criar nova consulta
    public function criar($usuario_id, $area_atuacao, $medico, $horario) {
        $sql = "INSERT INTO $this->table (usuario_id, area_atuacao, medico, horario) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$usuario_id, $area_atuacao, $medico, $horario]);
    }

    // ✅ Atualizar consulta
    public function atualizar($consulta_id, $usuario_id, $area_atuacao, $medico, $horario) {
        $sql = "UPDATE $this->table SET area_atuacao = ?, medico = ?, horario = ? 
                WHERE consulta_id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$area_atuacao, $medico, $horario, $consulta_id, $usuario_id]);
    }

    // ✅ Excluir consulta
    public function excluir($consulta_id, $usuario_id) {
        $sql = "DELETE FROM $this->table WHERE consulta_id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$consulta_id, $usuario_id]);
    }
}

?>
