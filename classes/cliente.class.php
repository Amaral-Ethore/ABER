<?php

class Cliente
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $endereco;
    private $telefone;
    private $cpfcnpj;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfcnpj = $cpfCnpj;
    }

    public function getCpfCnpj()
    {
        return $this->cpfcnpj;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
}
