<?php
include_once ('Conexao.php');
include_once ('LineUp.class.php');

class LineUpDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os canais
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * FROM line_up");
        $arrLineUp = array();
        foreach ($resultSet as $linha) {
            $arrLineUp[] = new LineUp($linha['pacotes_idpacote'], $linha['canais_idcanal']);
        }
        return $arrLineUp;
    }

//  Retorna id canais por pacote    
    static public function verificaCanalPorPacote($idpacote,$idcanal) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT l.pacotes_idpacote, c.nome_canal as canais_idcanal
                                    FROM line_up AS l
                                    INNER JOIN canais AS c ON l.canais_idcanal = c.idcanal
                                    INNER JOIN pacotes AS p ON l.pacotes_idpacote = p.idpacote
                                    INNER JOIN frequencias AS f ON c.frequencia = f.idfrequencia
                                WHERE p.idpacote = $idpacote AND c.idcanal = $idcanal");
        $lineUp = '';
        foreach ($resultSet as $linha) {
            $lineUp = new LineUp($linha['pacotes_idpacote'], $linha['canais_idcanal']);
        }
        return $lineUp;
    }
//  Retorna pacotes por canal
    static public function retornaPacotesPorCanal($canal) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT p.nome_pacote as pacotes_idpacote,l.canais_idcanal
                                    FROM line_up AS l
                                    INNER JOIN canais AS c ON l.canais_idcanal = c.idcanal
                                    INNER JOIN pacotes AS p ON l.pacotes_idpacote = p.idpacote
                                    INNER JOIN frequencias AS f ON c.frequencia = f.idfrequencia
                                where c.idcanal = $canal
                                order by p.idpacote ASC");
        $arrLineUp = array();
        foreach ($resultSet as $linha) {
            $arrLineUp[] = new LineUp($linha['pacotes_idpacote'], $linha['canais_idcanal']);
        }
        return $arrLineUp;
    }
    
/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere novo canal    
     static public function insere($pacote, $arrCanais) {
        $insere = '';
        foreach ($arrCanais as $canal) {
            $insere .= '('.$pacote.', '.$canal.'),';
        }
        $insere = substr($insere, 0, -1);
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO line_up(pacotes_idpacote,canais_idcanal) values $insere");
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
//    deleta
    static public function deleta($idpacote,$arrCanais) {
        $arrCanais = implode(',', $arrCanais);
        $db = Conexao::getInstance();
        $cmd = $db->prepare("DELETE FROM line_up WHERE pacotes_idpacote = $idpacote AND canais_idcanal  NOT IN ($arrCanais)");
        $cmd->execute();
    }
//    deleta
    static public function deletaTudo($idpacote) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("DELETE FROM line_up WHERE pacotes_idpacote = $idpacote");
        $cmd->execute();
    }
}