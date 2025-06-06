<?php

require_once 'models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    //Requisições

    public function register() {
        require 'views/auth/cadastro.html';
    }

    public function login() {
        require 'views/auth/login.html';
    }

    // Ações
    
    public function authLogin() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = $this->usuarioModel->autenticar($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['usuario_id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: index.php?rota=dashboard");
        } else {
            echo "Email ou senha inválidos.";
        }
    }

    public function authRegister() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $resultado = $this->usuarioModel->criar($nome, $email, $senha);

            if ($resultado) {
                header("Location: index.php?rota=login");
                exit;
            } else {
                echo "Erro ao cadastrar usuário.";
            }
        }
    }
}
?>
