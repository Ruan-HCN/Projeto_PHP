<?php
require_once 'models/Usuario.php';
require_once 'models/Consulta.php';

class ApiUsuarioController {
    public function getDadosUsuario() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        header('Content-Type: application/json');

        if (!isset($_SESSION['usuario_id'])) {
            echo json_encode(['erro' => 'Usuário não autenticado']);
            exit;
        }

        $user_id = $_SESSION['usuario_id'];

        $usuarioModel = new Usuario();
        $consultaModel = new Consulta();

        // Acessando a conexão de forma segura via getter
        $conn = $usuarioModel->getConnection();

        // Dados do usuário
        $sql = "SELECT usuario_id, nome, email FROM usuarios WHERE usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Consultas do usuário
        $consultas = $consultaModel->listarPorUsuario($user_id);

        echo json_encode([
            'usuario' => $usuario,
            'consultas' => $consultas
        ]);
    }
}
?>
