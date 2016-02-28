<?php


class Frequencias {
    private $idfrequencia;
    private $canal;
    private $qam_video;
    private $digital_analogico;

    function __construct($idfrequencia, $canal, $qam_video, $digital_analogico) {
        $this->idfrequencia = $idfrequencia;
        $this->canal = $canal;
        $this->qam_video = $qam_video;
        $this->digital_analogico = $digital_analogico;
    }
    
    function getIdfrequencia() {
        return $this->idfrequencia;
    }

    function getCanal() {
        return $this->canal;
    }

    function getQam_video() {
        return $this->qam_video;
    }

    function getDigital_analogico() {
        return $this->digital_analogico;
    }

    function setIdfrequencia($idfrequencia) {
        $this->idfrequencia = $idfrequencia;
    }

    function setCanal($canal) {
        $this->canal = $canal;
    }

    function setQam_video($qam_video) {
        $this->qam_video = $qam_video;
    }

    function setDigital_analogico($digital_analogico) {
        $this->digital_analogico = $digital_analogico;
    }


}
