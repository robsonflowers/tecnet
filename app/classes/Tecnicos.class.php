<?php

class Tecnicos {
    private $idtecnico;
    private $login;
    private $nome_tecnico;
    private $celular;
    private $status_tecnico;
    
    function __construct($idtecnico, $login, $nome_tecnico, $celular, $status_tecnico) {
        $this->idtecnico = $idtecnico;
        $this->login = $login;
        $this->nome_tecnico = $nome_tecnico;
        $this->celular = $celular;
        $this->status_tecnico = $status_tecnico;
    }

    function getIdtecnico() {
        return $this->idtecnico;
    }

    function getLogin() {
        return $this->login;
    }

    function getNome_tecnico() {
        return $this->nome_tecnico;
    }

    function getCelular() {
        return $this->celular;
    }

    function getStatus_tecnico() {
        return $this->status_tecnico;
    }

    function setIdtecnico($idtecnico) {
        $this->idtecnico = $idtecnico;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setNome_tecnico($nome_tecnico) {
        $this->nome_tecnico = $nome_tecnico;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setStatus_tecnico($status_tecnico) {
        $this->status_tecnico = $status_tecnico;
    }


}
