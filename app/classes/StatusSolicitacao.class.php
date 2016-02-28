<?php


class StatusSolicitacao {
    private $idstatus_solicitacao;
    private $descricao_st_sol;
    
    function __construct($idstatus_solicitacao, $descricao_st_sol) {
        $this->idstatus_solicitacao = $idstatus_solicitacao;
        $this->descricao_st_sol = $descricao_st_sol;
    }

    function getIdstatus_solicitacao() {
        return $this->idstatus_solicitacao;
    }

    function getDescricao_st_sol() {
        return $this->descricao_st_sol;
    }

    function setIdstatus_solicitacao($idstatus_solicitacao) {
        $this->idstatus_solicitacao = $idstatus_solicitacao;
    }

    function setDescricao_st_sol($descricao_st_sol) {
        $this->descricao_st_sol = $descricao_st_sol;
    }


}
