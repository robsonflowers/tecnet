<?php


class LineUp {
    private $pacotes_idpacote;
    private $canais_idcanal;
    
    function __construct($pacotes_idpacote, $canais_idcanal) {
        $this->pacotes_idpacote = $pacotes_idpacote;
        $this->canais_idcanal = $canais_idcanal;
    }

    function getPacotes_idpacote() {
        return $this->pacotes_idpacote;
    }

    function getCanais_idcanal() {
        return $this->canais_idcanal;
    }

    function setPacotes_idpacote($pacotes_idpacote) {
        $this->pacotes_idpacote = $pacotes_idpacote;
    }

    function setCanais_idcanal($canais_idcanal) {
        $this->canais_idcanal = $canais_idcanal;
    }



}
