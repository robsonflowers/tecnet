<?php

include_once ('Conexao.php');
include_once ('Pacotes.class.php');

class PacotesDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os pacotes
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * FROM pacotes");
        $arrPacotes = array();
        foreach ($resultSet as $linha) {
            $arrPacotes[] = new Pacotes($linha['idpacote'], $linha['nome_pacote']);
        }
        return $arrPacotes;
    }
//  Retorna pacote por ID
    static public function retornaPacotePorID($idPacote) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * FROM pacotes WHERE idpacote = $idPacote");
        $pacote = '';
        foreach ($resultSet as $linha) {
            $pacote = new Pacotes($linha['idpacote'], $linha['nome_pacote']);
        }
        return $pacote;
    }
      
/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere novo canal    
     static public function insere($nomePacote) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO pacotes(nome_pacote) values ('$nomePacote')");
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
