<?php

require_once "models/usuario.php";

class UsuarioController {

    private $usuarioActions;

    public function __construct() {
        $this->usuarioActions = new Usuario();
    }

    public function update() {
        require 'views/usuario/updateUsuario.php';
    }

    public function userUpdate() {
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

}

?>