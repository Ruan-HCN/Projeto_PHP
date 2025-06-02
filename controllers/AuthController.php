<?php

require_once 'models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function login() {
        require 'views/auth/login.php';
    }

    public function authLogin() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = $this->usuarioModel->autenticar($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: index.php?rota=consulta_listar");
        } else {
            echo "Email ou senha inválidos.";
        }
    }

    public function register() {
        require 'views/auth/register.php';
    }

    public function authRegister() {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $this->usuarioModel->criar($nome, $email, $senha);
        header("Location: index.php?rota=login");
    }
}
?>