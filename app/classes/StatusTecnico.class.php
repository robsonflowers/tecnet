<?php


class StatusTecnico {
    private $idstatus_tecnico;
    private $descricao_st_tec;
    
    function __construct($idstatus_tecnico, $descricao_st_tec) {
        $this->idstatus_tecnico = $idstatus_tecnico;
        $this->descricao_st_tec = $descricao_st_tec;
    }

    function getIdstatus_tecnico() {
        return $this->idstatus_tecnico;
    }

    function getDescricao_st_tec() {
        return $this->descricao_st_tec;
    }

    function setIdstatus_tecnico($idstatus_tecnico) {
        $this->idstatus_tecnico = $idstatus_tecnico;
    }

    function setDescricao_st_tec($descricao_st_tec) {
        $this->descricao_st_tec = $descricao_st_tec;
    }


}
