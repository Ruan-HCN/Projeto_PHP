<?php

require_once "models/Usuario.php";

class UsuarioController {

    private $usuarioActions;

    //Requisições

    public function __construct() {
        $this->usuarioActions = new Usuario();
    }

    public function require_update() {
        require 'views/usuario/updateUsuario.html';
    }

    public function require_delete(){
        require 'views/usuario/deleteUsuario.html';
    }

    // Ações

    public function user_update() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $user_id = $_SESSION['usuario_id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $resultado = $this->usuarioActions->atualizar($user_id, $nome, $email, $senha);

            if ($resultado) {
                header("Location: index.php?rota=dashboard");
                exit;
            } else {
                echo "Erro ao atualizar usuário.";
            }
        }
    }

    public function user_delete(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $user_id = $_SESSION['usuario_id'];
            $senha = $_POST['senha'];

            $resultado = $this->usuarioActions->deletar($user_id, $senha);

            if ($resultado) {
                header("Location: index.php?rota=dashboard");
                exit;
            } else {
                echo "Erro ao deletar usuário.";
            }
        }
    }
}

?>