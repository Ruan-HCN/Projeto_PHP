<?php

require_once 'models/Consulta.php';

class ConsultaController {

    private $consultaModel;


    // Requisições

    public function __construct(){
        $this->consultaModel = new Consulta();
    }

    public function require_create() {
        require 'views/consulta/createConsulta.html';
    }

    public function require_read(){
        require 'views/consulta/readConsulta.html';
    }

    public function require_update(){
        require 'views/consulta/updateConsulta.html';
    }
}

?>