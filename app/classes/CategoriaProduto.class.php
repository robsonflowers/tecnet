<?php


class CategoriaProduto {
    private $idcategoria_produto;
    private $descricao_ct_prod;
    
    function __construct($idcategoria_produto, $descricao_ct_prod) {
        $this->idcategoria_produto = $idcategoria_produto;
        $this->descricao_ct_prod = $descricao_ct_prod;
    }

    function getIdcategoria_produto() {
        return $this->idcategoria_produto;
    }

    function getDescricao_ct_prod() {
        return $this->descricao_ct_prod;
    }

    function setIdcategoria_produto($idcategoria_produto) {
        $this->idcategoria_produto = $idcategoria_produto;
    }

    function setDescricao_ct_prod($descricao_ct_prod) {
        $this->descricao_ct_prod = $descricao_ct_prod;
    }


}
