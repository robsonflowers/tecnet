<?php
include_once ('Conexao.php');
include_once ('Frequencias.class.php');

class FrequenciasDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os canais
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * FROM frequencias");
        $arrFrequencias = array();
        foreach ($resultSet as $linha) {
            $arrFrequencias[] = new Frequencias($linha['idfrequencia'], $linha['canal'], $linha['qam_video'], $linha['digital_analogico']);
        }
        return $arrFrequencias;
    }
//  Retorna canais por pacote    
    static public function retornaPorFrequencia($qamFrequencia) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * from frequencias
                                 WHERE qam_video = $qamFrequencia");
        $frequencia = '';
        foreach ($resultSet as $linha) {
            $frequencia = new Frequencias($linha['idfrequencia'], $linha['canal'], $linha['qam_video'], $linha['digital_analogico']);
        }
        return $frequencia;
    }

    
/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere novo canal    
     static public function insere($canal,$qam_video,$digital_analogico) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO frequencias(canal,qam_video,digital_analogico) values ($canal,$qam_video,'$digital_analogico')");
        $cmd->execute();
    }
    
/*  ############################################################################
    ALTERAÇÃO
    ############################################################################
*/ 
    
    
/*  ############################################################################
    EXCLUSÃO
    ############################################################################
*/  
}
