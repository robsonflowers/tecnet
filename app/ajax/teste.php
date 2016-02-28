<?php 
include_once('../classes/LineUp.dao.php');
include_once('../classes/Canais.dao.php');

    $idpacote = $_GET['idpacote'];
    $arrCanais = array();
    if(isset($_GET['canal'])){
        foreach($_GET['canal'] as $ch){
            $arrCanais[] = $ch;
        }
        LineUpDAO::insere($idpacote, $arrCanais);
        LineUpDAO::deleta($idpacote, $arrCanais);
    }
    else{
        LineUpDAO::deletaTudo($idpacote);
        echo 'deletado';
    }
    
    header('Location: ../../lineup/editar/');
    
    
    
    
    
?>