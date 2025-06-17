<?php

require_once 'models/Consulta.php';

class ConsultaController {

    private $consultaModel;

    public function __construct(){
        $this->consultaModel = new Consulta();
    }

    // Requisições de páginas

    public function require_create() {
        require 'views/consulta/createConsulta.html';
    }

    public function require_read(){
        require 'views/consulta/readConsulta.html';
    }

    public function require_update(){
        require 'views/consulta/updateConsulta.html';
    }

    // Ações

    public function create(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        session_start();

        $usuario_id = $_SESSION['usuario_id'];
        $paciente = $_POST['paciente'];

        $area_atuacao = $_POST['area'] ?? null; 

        $medico = $_POST['medico'];
        $horario = $_POST['horario'];

        if (!$area_atuacao) {
            echo "Área de atuação não fornecida.";
            exit;
        }

            $resultado = $this->consultaModel->criar($usuario_id, $paciente, $area_atuacao, $medico, $horario);

            if ($resultado) {
                header("Location: index.php?rota=consulta_read");
                exit;
            } else {
                echo "Erro ao criar a consulta.";
            }
        }
    }

    public function read() {
        $usuario_id = $_SESSION['usuario_id'];
        $consultas = $this->consultaModel->listarPorUsuario($usuario_id);
        require 'views/consulta/listarConsultas.php';  // Exemplo de view que você pode criar
    }

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario_id = $_SESSION['usuario_id'];
            $consulta_id = $_POST['consulta_id'];
            $paciente = $_POST['paciente'];
            $area_atuacao = $_POST['area_atuacao'];
            $medico = $_POST['medico'];
            $horario = $_POST['horario'];

            $resultado = $this->consultaModel->atualizar($consulta_id, $usuario_id, $paciente, $area_atuacao, $medico, $horario);

            if ($resultado) {
                header("Location: index.php?rota=consulta_read");
                exit;
            } else {
                echo "Erro ao atualizar a consulta.";
            }
        }
    }

    public function delete() {
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