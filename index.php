<?php
session_start();

require_once 'config/database.php';
require_once 'controllers/AuthController.php';

$rota = isset($_GET['rota']) ? $_GET['rota'] : 'login';

$rotasPublicas = ['login', 'register', 'auth_login', 'auth_register'];

if (!in_array($rota, $rotasPublicas) && !isset($_SESSION['usuario_id'])) {
    header('Location: index.php?rota=login');
    exit;
}

switch ($rota) {
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'auth_login':
        $controller = new AuthController();
        $controller->authLogin();
        break;

    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;

    case 'auth_register':
        $controller = new AuthController();
        $controller->authRegister();
        break;

    case 'dashboard':
        echo "<h1>Bem-vindo, " . $_SESSION['usuario_nome'] . "!</h1>";
        echo "<p><a href='logout.php'>Sair</a></p>";
        break;

    default:
        echo "Página não encontrada!";
        break;
}
?>
