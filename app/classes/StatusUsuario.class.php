<?php


class StatusUsuario {
    private $idstatus_usuario;
    private $descricao_st_usu;
    
    function __construct($idstatus_usuario, $descricao_st_usu) {
        $this->idstatus_usuario = $idstatus_usuario;
        $this->descricao_st_usu = $descricao_st_usu;
    }

    function getIdstatus_usuario() {
        return $this->idstatus_usuario;
    }

    function getDescricao_st_usu() {
        return $this->descricao_st_usu;
    }

    function setIdstatus_usuario($idstatus_usuario) {
        $this->idstatus_usuario = $idstatus_usuario;
    }

    function setDescricao_st_usu($descricao_st_usu) {
        $this->descricao_st_usu = $descricao_st_usu;
    }


}
