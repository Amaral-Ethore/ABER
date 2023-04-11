<?php

class Produtos {
    private $id;
    private $nome;
    private $descricao;
    private $codebar;
    private $marca;
    private $validade;
    private $setor;
    private $imagem;

    public function setid($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setCodebar($codebar) {
        $this->codebar = $codebar;
    }

    public function getCodebar() {
        return $this->codebar;
    }

    
    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }
    
    public function setValidade($validade) {
        $this->validade = $validade;
    }

    public function getValidade() {
        return $this->validade;
    }

    public function setSetor($setor) {
        $this->setor = $setor;
    }

    public function getSetor() {
        return $this->setor;
    }
    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getImagem() {
        return $this->imagem;
    }
}