<?php


class SolXProd {
    private $solicitacoes_idsolicitacao;
    private $produtos_idproduto;
    private $quantidade;
    
    function __construct($solicitacoes_idsolicitacao, $produtos_idproduto, $quantidade) {
        $this->solicitacoes_idsolicitacao = $solicitacoes_idsolicitacao;
        $this->produtos_idproduto = $produtos_idproduto;
        $this->quantidade = $quantidade;
    }

    function getSolicitacoes_idsolicitacao() {
        return $this->solicitacoes_idsolicitacao;
    }

    function getProdutos_idproduto() {
        return $this->produtos_idproduto;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setSolicitacoes_idsolicitacao($solicitacoes_idsolicitacao) {
        $this->solicitacoes_idsolicitacao = $solicitacoes_idsolicitacao;
    }

    function setProdutos_idproduto($produtos_idproduto) {
        $this->produtos_idproduto = $produtos_idproduto;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }


}
