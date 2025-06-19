<?php

require_once 'models/Consulta.php';

class ConsultaController {

    private $consultaModel;

    public function __construct() {
        $this->consultaModel = new Consulta();
    }

    // Páginas
    public function require_create() {
        require 'views/consulta/createConsulta.html';
    }

    public function require_read() {
        require 'views/consulta/readConsulta.html';
    }

    public function require_update() {
        require 'views/consulta/updateConsulta.html';
    }

    // Ações
    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            session_start();

            $usuario_id = $_SESSION['usuario_id'];

            $area_atuacao = $_POST['areaAtuacao'] ?? null;
            $medico = $_POST['medico'] ?? null;
            $horario = $_POST['horario'] ?? null;

            if (!$area_atuacao || !$medico || !$horario) {
                echo "Por favor, preencha todos os campos.";
                exit;
            }

            $resultado = $this->consultaModel->criar($usuario_id, $area_atuacao, $medico, $horario);

            if ($resultado) {
                header("Location: index.php?rota=consulta_read");
                exit;
            } else {
                echo "Erro ao criar a consulta.";
            }
        }
    }

    public function read() {
        session_start();
        $usuario_id = $_SESSION['usuario_id'];

        $consultas = $this->consultaModel->listarPorUsuario($usuario_id);
        require 'views/consulta/listarConsultas.php';
    }

    public function update() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario_id = $_SESSION['usuario_id'];
            $consulta_id = $_POST['consulta_id'];
            $area_atuacao = $_POST['area_atuacao'] ?? null;
            $medico = $_POST['medico'] ?? null;
            $horario = $_POST['horario'] ?? null;

            $resultado = $this->consultaModel->atualizar($consulta_id, $usuario_id, $area_atuacao, $medico, $horario);

            if ($resultado) {
                header("Location: index.php?rota=consulta_read");
                exit;
            } else {
                echo "Erro ao atualizar a consulta.";
            }
        }
    }

    public function delete() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario_id = $_SESSION['usuario_id'];
            $consulta_id = $_POST['consulta_id'];

            $resultado = $this->consultaModel->excluir($consulta_id, $usuario_id);

            if ($resultado) {
                header("Location: index.php?rota=consulta_read");
                exit;
            } else {
                echo "Erro ao excluir a consulta.";
            }
        }
    }
}

?>
