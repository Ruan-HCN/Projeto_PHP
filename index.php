<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//não apaga, deixa essa porra aí, é ajuda para leigos

session_start();

require_once 'config/database.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/UsuarioController.php';
require_once 'controllers/ConsultaController.php';


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
        echo "<p><a href='index.php?rota=usuario_atualizar'>atualizar</a></p>";
        echo "<p><a href='index.php?rota=usuario_delete'>Deletar</a></p>";
        echo "<p><a href='logout.php'>Sair</a></p>";
        break;
    
    case 'usuario_atualizar':
        $controller = new UsuarioController();
        $controller->require_update();
        break;

    case 'usuario_update_post':
        $controller = new UsuarioController();
        $controller->user_update();
        break;
    
    case 'usuario_delete':
        $controller = new UsuarioController();
        $controller->require_delete();
        break;

    case 'usuario_delete_post':
        $controller = new UsuarioController();
        $controller->user_delete();
        break;
    
    case 'consulta_create':
        $controller = new ConsultaController();
        $controller->require_create();
        break;

    case 'consulta_read':
        $controller = new ConsultaController();
        $controller->require_read();
        break;

    case 'consulta_update':
        $controller = new ConsultaController();
        $controller->require_update();
        break;

    default:
        echo "Página não encontrada!";
        break;
}
?>
