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

    // 🔍 Busca uma consulta específica, garantindo que pertence ao usuário
    public function buscarPorId($consulta_id, $usuario_id) {
        $sql = "SELECT * FROM $this->table WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$consulta_id, $usuario_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($usuario_id, $paciente, $area_atuacao, $medico, $horario) {
        $sql = "INSERT INTO $this->table (usuario_id, paciente, area_atuacao, medico, horario) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$usuario_id, $paciente, $area_atuacao, $medico, $horario]);
    }

    public function atualizar($consulta_id, $usuario_id, $paciente, $area_atuacao, $medico, $horario) {
        $sql = "UPDATE $this->table SET paciente = ?, area_atuacao = ?, medico = ?, horario = ? 
                WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$paciente, $area_atuacao, $medico, $horario, $consulta_id, $usuario_id]);
    }

    public function excluir($consulta_id, $usuario_id) {
        $sql = "DELETE FROM $this->table WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$consulta_id, $usuario_id]);
    }
}
?>