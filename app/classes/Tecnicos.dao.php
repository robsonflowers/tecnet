<?php
include_once ('Conexao.php');
include_once ('Tecnicos.class.php');

class TecnicoDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os canais
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT t.idtecnico, t.login, t.celular, t.nome_tecnico, st.descricao_st_tec as status_tecnico
                                    FROM tecnicos as t
                                    INNER JOIN status_tecnico as st ON st.idstatus_tecnico = t.status_tecnico
                                ORDER BY t.nome_tecnico ASC");
        $arrTecnicos = array();
        foreach ($resultSet as $linha) {
            $arrTecnicos[] = new Tecnicos($linha['idtecnico'], $linha['login'], $linha['nome_tecnico'], $linha['celular'], $linha['status_tecnico']);
        }
        return $arrTecnicos;
    }
//  Retorna canal por ID
    static public function retornaTecnicoPorLogin($login) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT t.idtecnico, t.login, t.celular, t.nome_tecnico, st.descricao_st_tec as status_tecnico
                                    FROM tecnicos as t
                                    INNER JOIN status_tecnico as st ON st.idstatus_tecnico = t.status_tecnico
                                WHERE t.login = $login
                                ORDER BY t.nome_tecnico ASC");
        $tecnico = '';
        foreach ($resultSet as $linha) {
            $tecnico = new Tecnicos($linha['idtecnico'], $linha['login'], $linha['nome_tecnico'], $linha['celular'], $linha['status_tecnico']);
        }
        return $tecnico;
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
