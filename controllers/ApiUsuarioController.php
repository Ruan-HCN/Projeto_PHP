<?php
session_start();
require_once 'models/Usuario.php';
require_once 'models/Consulta.php';

header('Content-Type: application/json');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['erro' => 'Usuário não autenticado']);
    exit;
}

$user_id = $_SESSION['usuario_id'];

$usuarioModel = new Usuario();
$consultaModel = new Consulta();

// Pega os dados do usuário
$sql = "SELECT usuario_id, nome, email FROM usuarios WHERE usuario_id = ?";
$stmt = $usuarioModel->conn->prepare($sql);
$stmt->execute([$user_id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Pega as consultas do usuário
$consultas = $consultaModel->listarPorUsuario($user_id);

// Retorna tudo em JSON
echo json_encode([
    'usuario' => $usuario,
    'consultas' => $consultas
]);
?>
