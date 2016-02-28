<?php


class Canais {
    private $idcanal;
    private $display;
    private $nome_canal;
    private $logotipo;
    private $frequencia;
    
    function __construct($idcanal, $display, $nome_canal, $logotipo, $frequencia) {
        $this->idcanal = $idcanal;
        $this->display = $display;
        $this->nome_canal = $nome_canal;
        $this->logotipo = $logotipo;
        $this->frequencia = $frequencia;
    }

    function getIdcanal() {
        return $this->idcanal;
    }

    function getDisplay() {
        return $this->display;
    }

    function getNome_canal() {
        return $this->nome_canal;
    }

    function getLogotipo() {
        return $this->logotipo;
    }

    function getFrequencia() {
        return $this->frequencia;
    }

    function setIdcanal($idcanal) {
        $this->idcanal = $idcanal;
    }

    function setDisplay($display) {
        $this->display = $display;
    }

    function setNome_canal($nome_canal) {
        $this->nome_canal = $nome_canal;
    }

    function setLogotipo($logotipo) {
        $this->logotipo = $logotipo;
    }

    function setFrequencia($frequencia) {
        $this->frequencia = $frequencia;
    }



}
