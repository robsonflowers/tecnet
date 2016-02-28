<?php


class Solicitacoes {
    private $idsolicitacao;
    private $data_solicitacao;
    private $data_entrega;
    private $tecnico;
    private $status_solicitacao;
    
    function __construct($idsolicitacao, $data_solicitacao, $data_entrega, $tecnico, $status_solicitacao) {
        $this->idsolicitacao = $idsolicitacao;
        $this->data_solicitacao = $data_solicitacao;
        $this->data_entrega = $data_entrega;
        $this->tecnico = $tecnico;
        $this->status_solicitacao = $status_solicitacao;
    }

    function getIdsolicitacao() {
        return $this->idsolicitacao;
    }

    function getData_solicitacao() {
        return $this->data_solicitacao;
    }

    function getData_entrega() {
        return $this->data_entrega;
    }

    function getTecnico() {
        return $this->tecnico;
    }

    function getStatus_solicitacao() {
        return $this->status_solicitacao;
    }

    function setIdsolicitacao($idsolicitacao) {
        $this->idsolicitacao = $idsolicitacao;
    }

    function setData_solicitacao($data_solicitacao) {
        $this->data_solicitacao = $data_solicitacao;
    }

    function setData_entrega($data_entrega) {
        $this->data_entrega = $data_entrega;
    }

    function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }

    function setStatus_solicitacao($status_solicitacao) {
        $this->status_solicitacao = $status_solicitacao;
    }


}
