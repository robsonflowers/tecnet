<?php

include_once ('Log.class.php');
include_once ('Conexao.php');
class LogDAO {
//    retorna a quantidade de registros
    static public function conta() {
        $db = Conexao::getInstance();
        $resultSet = $db->prepare("SELECT count(idlog) as total from log");
        $resultSet->execute();
        $total = $resultSet->fetch(PDO::FETCH_OBJ);
        return $total->total;
    }
//    retorna todos os registros
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("select c.contrato, l.log, l.os, l.dt_atendimento, concat(TIME_FORMAT(j.hr_inicio,'%h:%m'),' - ',TIME_FORMAT(j.hr_fim,'%h:%m')) as janela_atendimento, t.descricao as tipo_vt, cb.codigo as cod_baixa, te.nome as tecnico, l.obs_tec, 
l.obs_tec, l.obs, l.tap, l.passivos, l.conectores
from log as l 
inner join contrato as c on l.contrato = c.idcontrato
inner join janela_atendimento as j on l.janela_atendimento = j.idjanela_atendimento
inner join tipo_vt as t on l.tipo_vt = t.idtipo_vt
inner join tecnico as te on l.tecnico = te.idtecnico
inner join cod_baixa as cb on l.cod_baixa = cb.idcod_baixa"
        );
        $arrLogs = array();
        foreach ($resultSet as $linha) {
            $arrLogs[] = new Log($linha['idlog'], $linha['contrato'], $linha['log'], $linha['os'], 
                    $linha['dt_atendimento'], $linha['janela_atendimento'], $linha['tipo_vt'],
                    $linha['cod_baixa'], $linha['tecnico'], $linha['obs_tec'], $linha['obs'], $linha['tap'],
                    $linha['passivos'], $linha['conectores'],$linha['status']);
        }
        return $arrLogs;
    }
//      retorna todos os registros por status
    static public function retornaEmAcompanhamento() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("select l.idlog, c.contrato, l.log, l.os, DATE_FORMAT(l.dt_atendimento,'%d/%m/%Y') as dt_atendimento, concat(TIME_FORMAT(j.hr_inicio,'%h:%m'),' - ',TIME_FORMAT(j.hr_fim,'%h:%m')) as janela_atendimento, t.descricao as tipo_vt, concat(cb.codigo,'-',cb.nome_codigo) as cod_baixa, te.nome as tecnico, l.obs_tec, 
l.obs_tec, l.obs, l.tap, l.passivos, l.conectores, s.status
FROM log AS l 
INNER JOIN contrato AS c ON l.contrato = c.idcontrato
INNER JOIN janela_atendimento AS j ON l.janela_atendimento = j.idjanela_atendimento
INNER JOIN tipo_vt AS t ON l.tipo_vt = t.idtipo_vt
INNER JOIN tecnico AS te ON l.tecnico = te.idtecnico
INNER JOIN cod_baixa AS cb ON l.cod_baixa = cb.idcod_baixa
INNER JOIN status_log AS s ON l.status = s.idstatus_log
WHERE l.status = 2 ORDER BY l.dt_atendimento DESC");
        $arrLogs = array();
        foreach ($resultSet as $linha) {
            $arrLogs[] = new Log($linha['idlog'], $linha['contrato'], $linha['log'], $linha['os'],
                    $linha['dt_atendimento'], $linha['janela_atendimento'], $linha['tipo_vt'],
                    $linha['cod_baixa'], $linha['tecnico'], $linha['obs_tec'], $linha['obs'], $linha['tap'],
                    $linha['passivos'], $linha['conectores'],$linha['status']);
        }
        return $arrLogs;
    }
//      retorna último registro antes da log atual
    static public function retornaUltimo($contrato) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("select l.idlog, c.contrato, l.log, l.os, l.dt_atendimento, concat(TIME_FORMAT(j.hr_inicio,'%h:%m'),' - ',TIME_FORMAT(j.hr_fim,'%h:%m')) as janela_atendimento, t.descricao as tipo_vt, concat(cb.codigo,'-',cb.nome_codigo) as cod_baixa, te.nome as tecnico, l.obs_tec, 
l.obs_tec, l.obs, l.tap, l.passivos, l.conectores, s.status
FROM log AS l 
INNER JOIN contrato AS c ON l.contrato = c.idcontrato
INNER JOIN janela_atendimento AS j ON l.janela_atendimento = j.idjanela_atendimento
INNER JOIN tipo_vt AS t ON l.tipo_vt = t.idtipo_vt
INNER JOIN tecnico AS te ON l.tecnico = te.idtecnico
INNER JOIN cod_baixa AS cb ON l.cod_baixa = cb.idcod_baixa
INNER JOIN status_log AS s ON l.status = s.idstatus_log
WHERE c.contrato = $contrato ORDER BY l.dt_atendimento ASC limit 0,1");
        $log = '';
        foreach ($resultSet as $linha) {
            $log = new Log($linha['idlog'], $linha['contrato'], $linha['log'], $linha['os'],
                    $linha['dt_atendimento'], $linha['janela_atendimento'], $linha['tipo_vt'],
                    $linha['cod_baixa'], $linha['tecnico'], $linha['obs_tec'], $linha['obs'], $linha['tap'],
                    $linha['passivos'], $linha['conectores'],$linha['status']);
        }
        return $log;
    }
    //    retorna registro por contrato
    static public function retornaPorContrato($contrato) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("select l.idlog, c.contrato, l.log, l.os, DATE_FORMAT(l.dt_atendimento,'%d/%m/%Y') as dt_atendimento, concat(TIME_FORMAT(j.hr_inicio,'%h:%m'),' - ',TIME_FORMAT(j.hr_fim,'%h:%m')) as janela_atendimento, t.descricao as tipo_vt, concat(cb.codigo,'-',cb.nome_codigo) as cod_baixa, te.nome as tecnico, l.obs_tec, 
l.obs_tec, l.obs, l.tap, l.passivos, l.conectores, s.status
from log as l 
inner join contrato as c on l.contrato = c.idcontrato
inner join janela_atendimento as j on l.janela_atendimento = j.idjanela_atendimento
inner join tipo_vt as t on l.tipo_vt = t.idtipo_vt
inner join tecnico as te on l.tecnico = te.idtecnico
inner join cod_baixa as cb on l.cod_baixa = cb.idcod_baixa
inner join status_log as s on l.status = s.idstatus_log
where c.contrato = $contrato"
        );
        $arrLogs = array();
        foreach ($resultSet as $linha) {
            $arrLogs[] = new Log($linha['idlog'], $linha['contrato'], $linha['log'], $linha['os'],
                    $linha['dt_atendimento'], $linha['janela_atendimento'], $linha['tipo_vt'],
                    $linha['cod_baixa'], $linha['tecnico'], $linha['obs_tec'], $linha['obs'], $linha['tap'],
                    $linha['passivos'], $linha['conectores'],$linha['status']);
        }
        return $arrLogs;
    }
    //      retorna registro por contrato e status
static public function retornaPorContratoStatus($contrato,$status) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("select l.idlog, c.contrato, l.log, l.os, DATE_FORMAT(l.dt_atendimento,'%d/%m/%Y') as dt_atendimento, concat(TIME_FORMAT(j.hr_inicio,'%h:%m'),' - ',TIME_FORMAT(j.hr_fim,'%h:%m')) as janela_atendimento, t.descricao as tipo_vt, concat(cb.codigo,'-',cb.nome_codigo) as cod_baixa, te.nome as tecnico, l.obs_tec, 
l.obs_tec, l.obs, l.tap, l.passivos, l.conectores, s.status
from log as l 
inner join contrato as c on l.contrato = c.idcontrato
inner join janela_atendimento as j on l.janela_atendimento = j.idjanela_atendimento
inner join tipo_vt as t on l.tipo_vt = t.idtipo_vt
inner join tecnico as te on l.tecnico = te.idtecnico
inner join cod_baixa as cb on l.cod_baixa = cb.idcod_baixa
inner join status_log as s on l.status = s.idstatus_log
where c.contrato = $contrato and l.status = $status");
        $arrLogs = array();
        foreach ($resultSet as $linha) {
            $arrLogs[] = new Log($linha['idlog'], $linha['contrato'], $linha['log'], $linha['os'],
                    $linha['dt_atendimento'], $linha['janela_atendimento'], $linha['tipo_vt'],
                    $linha['cod_baixa'], $linha['tecnico'], $linha['obs_tec'], $linha['obs'], $linha['tap'],
                    $linha['passivos'], $linha['conectores'],$linha['status']);
        }
        return $arrLogs;
    }
//      retorna QUANTIDADE por contrato em formato json
    static public function retornaQntContratoJSON($contrato) {
        $db = Conexao::getInstance();
        $total = $db->prepare("select count(l.idlog) as total, l.contrato as idcontrato
from log as l 
inner join contrato as c on l.contrato = c.idcontrato
where c.contrato = $contrato"
        );
        $total->execute();
        return json_encode($total->fetchAll(PDO::FETCH_ASSOC));
    }

    //    retorna registro por contrato EM FORMADO JSON
    static public function retornaPorOSJSON($os) {
        $db = Conexao::getInstance();
        $resultSet = $db->prepare("select l.idlog, c.contrato, c.endereco, l.log, l.os, DATE_FORMAT(l.dt_atendimento,'%d/%m/%Y') as dt_atendimento, concat(TIME_FORMAT(j.hr_inicio,'%h:%m'),' - ',TIME_FORMAT(j.hr_fim,'%h:%m')) as janela_atendimento, l.tipo_vt, concat(cb.codigo,'-',cb.nome_codigo) as cod_baixa, te.nome as tecnico, l.obs_tec, 
l.obs_tec, l.obs, l.tap, l.passivos, l.conectores, s.status
from log as l 
inner join contrato as c on l.contrato = c.idcontrato
inner join janela_atendimento as j on l.janela_atendimento = j.idjanela_atendimento

inner join tecnico as te on l.tecnico = te.idtecnico
inner join cod_baixa as cb on l.cod_baixa = cb.idcod_baixa
inner join status_log as s on l.status = s.idstatus_log
where l.os = $os"
        );
        $resultSet->execute();
        return json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
    }
    
//  ----------------------------------------------------------------------------------------------------------------------
//  INSERÇÃO, ATUALIZAÇÃO E EXCLUSÃO   
//  ----------------------------------------------------------------------------------------------------------------------  

//    insere 
    static public function insere($idcontrato,$log,$ordemservico,$dataatendimento,$janelaatendimento,$tipovisita,$status) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT INTO log(contrato, log, os, dt_atendimento,
                 janela_atendimento, tipo_vt, cod_baixa, tecnico, obs_tec, obs, tap, passivos,
                 conectores, status) values ($idcontrato,$log,$ordemservico,
                  '$dataatendimento',$janelaatendimento,$tipovisita,1,1,'','','n','n','n','$status')");
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





