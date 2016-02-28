<?php

include_once ('Contrato.class.php');
include_once ('Conexao.php');
class ContratoDAO {
//    retorna a quantidade de registros
    static public function conta() {
        $db = Conexao::getInstance();
        $resultSet = $db->prepare("SELECT count(idcontrato) as total from contrato");
        $resultSet->execute();
        $total = $resultSet->fetch(PDO::FETCH_OBJ);
        return $total->total;
    }
//    retorna todos os registros
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * FROM contrato");
        $arrContratos = array();
        foreach ($resultSet as $linha) {
            $arrContratos[] = new Contrato($linha['idcontrato'], $linha['contrato'], $linha['segmento'], $linha['endereco'], $linha['dt_adicao']);
        }
        return $arrContratos;
    }
//    retorna ID do contrato pelo numero do contrato
    static public function retornaIdContrato($buscaContrato) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * FROM contrato where contrato = $buscaContrato");
        $contrato = '';
        foreach ($resultSet as $linha) {
            $contrato = new Contrato($linha['idcontrato'], $linha['contrato'], $linha['segmento'], $linha['endereco'], $linha['dt_adicao']);
        }
        return $contrato;
    }
//    insere 
    static public function insere($contrato, $segmento, $endereco) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO contrato(contrato, segmento, endereco, dt_adicao) values ($contrato, $segmento, '$endereco', now())");
        $cmd->execute();
        
        
       
    }
//    atualiza
    static public function atualiza($idtecnico) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("UPDATE tecnico SET
                                nome = '$funcao->getDescricao()',
                                login = '$funcao->getDescricao()',
                                telefone = '$funcao->getDescricao()'
                                where idfuncaocolaborador = $idtecnico");
        $cmd->execute();
    }
//    deleta
    static public function deleta($idtecnico) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("DELETE FROM tecnico WHERE idtecnico = $idtecnico");
        $cmd->execute();
    }
    
}





