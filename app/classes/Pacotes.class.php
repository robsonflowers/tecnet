<?php


class Pacotes {
    private $idpacote;
    private $nome_pacote;
    
    function __construct($idpacote, $nome_pacote) {
        $this->idpacote = $idpacote;
        $this->nome_pacote = $nome_pacote;
    }

    function getIdpacote() {
        return $this->idpacote;
    }

    function getNome_pacote() {
        return $this->nome_pacote;
    }

    function setIdpacote($idpacote) {
        $this->idpacote = $idpacote;
    }

    function setNome_pacote($nome_pacote) {
        $this->nome_pacote = $nome_pacote;
    }


}
