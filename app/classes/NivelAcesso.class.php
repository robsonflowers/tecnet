<?php


class NivelAcesso {
    private $idnivel_acesso;
    private $nivel_acesso;
    private $descricao_nv_ace;
    
    function __construct($idnivel_acesso, $nivel_acesso, $descricao_nv_ace) {
        $this->idnivel_acesso = $idnivel_acesso;
        $this->nivel_acesso = $nivel_acesso;
        $this->descricao_nv_ace = $descricao_nv_ace;
    }

    function getIdnivel_acesso() {
        return $this->idnivel_acesso;
    }

    function getNivel_acesso() {
        return $this->nivel_acesso;
    }

    function getDescricao_nv_ace() {
        return $this->descricao_nv_ace;
    }

    function setIdnivel_acesso($idnivel_acesso) {
        $this->idnivel_acesso = $idnivel_acesso;
    }

    function setNivel_acesso($nivel_acesso) {
        $this->nivel_acesso = $nivel_acesso;
    }

    function setDescricao_nv_ace($descricao_nv_ace) {
        $this->descricao_nv_ace = $descricao_nv_ace;
    }


}
