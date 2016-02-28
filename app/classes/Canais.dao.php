<?php
include_once ('Conexao.php');
include_once ('Canais.class.php');

class CanaisDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os canais
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.idcanal, c.display, c.nome_canal, c.logotipo, f.qam_video as frequencia
                                    FROM canais AS c
                                    INNER JOIN frequencias AS f ON f.idfrequencia = c.frequencia
                                ORDER BY c.display ASC");
        $arrCanais = array();
        foreach ($resultSet as $linha) {
            $arrCanais[] = new Canais($linha['idcanal'], $linha['display'], $linha['nome_canal'], $linha['logotipo'], $linha['frequencia']);
        }
        return $arrCanais;
    }
//  Retorna canais por pacote
    static public function retornaCanaisPorPacote($idPacote) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.idcanal, c.display, c.nome_canal, c.logotipo, f.qam_video as frequencia
                                    FROM canais AS c
                                    INNER JOIN frequencias AS f ON f.idfrequencia = c.frequencia
                                    inner join line_up as l on l.canais_idcanal = c.idcanal
                                WHERE l.pacotes_idpacote = $idPacote
                                ORDER BY c.display ASC");
        $arrCanais = array();
        foreach ($resultSet as $linha) {
            $arrCanais[] = new Canais($linha['idcanal'], $linha['display'], $linha['nome_canal'], $linha['logotipo'], $linha['frequencia']);
        }
        return $arrCanais;
    }
//  Retorna canal por ID
    static public function retornaCanalPorID($idcanal) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * FROM canais where idcanal = $idcanal");
        $canal = array();
        foreach ($resultSet as $linha) {
            $canal = new Canais($linha['idcanal'], $linha['display'], $linha['nome_canal'], $linha['logotipo'], $linha['frequencia']);
        }
        return $canal;
    }    
//  Retorna canal por display
    static public function retornaCanalPorDisplay($display) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.idcanal, c.display, c.nome_canal, c.logotipo, f.qam_video as frequencia
                                    FROM canais AS c
                                    INNER JOIN frequencias AS f ON f.idfrequencia = c.frequencia
                                WHERE c.display = $display
                                ORDER BY c.display ASC");
        $canal = '';
        foreach ($resultSet as $linha) {
            $canal = new Canais($linha['idcanal'], $linha['display'], $linha['nome_canal'], $linha['logotipo'], $linha['frequencia']);
        }
        return $canal;
    }
//  Busca canal por nome ou display
    static public function buscaCanal($busca) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.idcanal, c.display, c.nome_canal, c.logotipo, f.qam_video as frequencia
                                    FROM canais AS c
                                    INNER JOIN frequencias AS f ON f.idfrequencia = c.frequencia
                                WHERE c.display LIKE '%$busca%' OR c.nome_canal LIKE '%$busca%'
                                ORDER BY c.display ASC");
        $canal = array();
        foreach ($resultSet as $linha) {
            $canal[] = new Canais($linha['idcanal'], $linha['display'], $linha['nome_canal'], $linha['logotipo'], $linha['frequencia']);
        }
        return $canal;
    } 
/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere novo canal    
     static public function insere($display, $nome, $frequencia) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO canais(display, nome_canal, frequencia) values ($display, '$nome', $frequencia)");
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