<?php
session_start();

// require_once 'config/database.php';
// require_once 'controllers/AuthController.php';
// require_once 'controllers/UsuarioController.php';
// require_once 'controllers/ConsultaController.php';

// $rota = isset($_GET['rota']) ? $_GET['rota'] : 'login';

// $rotasPublicas = ['login', 'register', 'auth_login', 'auth_register'];

// if (!in_array($rota, $rotasPublicas) && !isset($_SESSION['usuario_id'])) {
//     header('Location: index.php?rota=login');
//     exit;
// }

// // Controla as rotas
// switch ($rota) {
//     case 'login':
//         $controller = new AuthController();
//         $controller->login();
//         break;

//     case 'auth_login':
//         $controller = new AuthController();
//         $controller->authLogin();
//         break;

//     case 'register':
//         $controller = new AuthController();
//         $controller->register();
//         break;

//     case 'auth_register':
//         $controller = new AuthController();
//         $controller->authRegister();
//         break;

//     case 'usuario_ver':
//         $controller = new UsuarioController();
//         $controller->ver();
//         break;

//     case 'usuario_editar':
//         $controller = new UsuarioController();
//         $controller->editar();
//         break;

//     case 'usuario_atualizar':
//         $controller = new UsuarioController();
//         $controller->atualizar();
//         break;

//     case 'usuario_excluir':
//         $controller = new UsuarioController();
//         $controller->excluir();
//         break;

//     case 'consulta_listar':
//         $controller = new ConsultaController();
//         $controller->listar();
//         break;

//     case 'consulta_criar':
//         $controller = new ConsultaController();
//         $controller->criar();
//         break;

//     case 'consulta_salvar':
//         $controller = new ConsultaController();
//         $controller->salvar();
//         break;

//     case 'consulta_editar':
//         $controller = new ConsultaController();
//         $controller->editar();
//         break;

//     case 'consulta_atualizar':
//         $controller = new ConsultaController();
//         $controller->atualizar();
//         break;

//     case 'consulta_excluir':
//         $controller = new ConsultaController();
//         $controller->excluir();
//         break;

//     default:
//         echo "Página não encontrada!";
//         break;
// }


echo "<h1>Bem-vindo ao Front Controller!</h1>";


?>