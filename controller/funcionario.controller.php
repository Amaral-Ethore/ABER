<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "./DAO/funcionarioDAO.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "./classes/funcionario.class.php");

class FuncionarioController
{

    public function buscarTodos()
    {
        $dao = new FuncionarioDAO();
        return $dao->buscarTodos();
    }

    public function buscarPorId($id)
    {
        $dao = new FuncionarioDAO();
        return $dao->buscarUm($id);
    }
    public function buscarPorEmail($mail)
    {
        $dao = new FuncionarioDAO();
        return $dao->buscarPorEmail($mail);
    }
    public function criarFuncionario(Funcionario $funcionario)
    {
        $dao = new FuncionarioDAO();
        return $dao->inserirFuncionario($funcionario);
    }

    public function atualizarFuncionario(Funcionario $funcionario) {
        $dao = new FuncionarioDAO();
        return $dao->atualizaFuncionario($funcionario);
    }

    public function removeFuncionario(int $id) {
        $dao  = new FuncionarioDAO();
        return $dao->removeFuncionario($id);
    }
}