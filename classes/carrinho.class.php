<?php

class Carrinho
{
    private $id;
    private $compra;
    private $produto;
    private $quantprod;
    private $preco;
    private $nome;
   

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCompra($compra)
    {
        $this->compra = $compra;
    }

    public function getCompra()
    {
        return $this->compra;
    }
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getProduto()
    {
        return $this->produto;
    }
    public function setQuantprod($quantprod)
    {
        $this->quantprod = $quantprod;
    }

    public function getQuantprod()
    {
        return $this->quantprod;
    }
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
}