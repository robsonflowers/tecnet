<?php


class Produtos {
    private $idproduto;
    private $nome_produto;
    private $figura;
    private $categoria_produto;
    
    function __construct($idproduto, $nome_produto, $figura, $categoria_produto) {
        $this->idproduto = $idproduto;
        $this->nome_produto = $nome_produto;
        $this->figura = $figura;
        $this->categoria_produto = $categoria_produto;
    }
    
    function getIdproduto() {
        return $this->idproduto;
    }

    function getNome_produto() {
        return $this->nome_produto;
    }

    function getFigura() {
        return $this->figura;
    }

    function getCategoria_produto() {
        return $this->categoria_produto;
    }

    function setIdproduto($idproduto) {
        $this->idproduto = $idproduto;
    }

    function setNome_produto($nome_produto) {
        $this->nome_produto = $nome_produto;
    }

    function setFigura($figura) {
        $this->figura = $figura;
    }

    function setCategoria_produto($categoria_produto) {
        $this->categoria_produto = $categoria_produto;
    }


}
