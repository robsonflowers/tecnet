<?php


class Usuarios {
    private $idusuario;
    private $tecnico;
    private $usuario;
    private $senha;
    private $nivel_acesso;
    private $status_usuario;
    
    function __construct($idusuario, $tecnico, $usuario, $senha, $nivel_acesso, $status_usuario) {
        $this->idusuario = $idusuario;
        $this->tecnico = $tecnico;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->nivel_acesso = $nivel_acesso;
        $this->status_usuario = $status_usuario;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getTecnico() {
        return $this->tecnico;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNivel_acesso() {
        return $this->nivel_acesso;
    }

    function getStatus_usuario() {
        return $this->status_usuario;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNivel_acesso($nivel_acesso) {
        $this->nivel_acesso = $nivel_acesso;
    }

    function setStatus_usuario($status_usuario) {
        $this->status_usuario = $status_usuario;
    }


}
