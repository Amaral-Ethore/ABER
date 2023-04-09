<?php
    class Funcionario{
        private int $id;
        private string $nome;
        private string $email;
        private string $senha;
        private string $telefone;
        private bool $ativo;

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function getTelefone(){
            return $this->telefone;
        }
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }
        public function getAtivo(){
            return $this->telefone;
        }
        public function setAtivo($ativo){
            $this->ativo = $ativo;
        }
}