<?php
require_once('../classes/funcionario.class.php');
require_once('../controller/funcionario.controller.php');
function buscaFuncionario($mailfuncionario, $senhafuncionario){
    $controller = new FuncionarioController();
    $funcionario = new Funcionario();
    $funcionario = $controller->buscarPorEmail($mailfuncionario);
    if($mailfuncionario && $senhafuncionario == $funcionario->getSenha()){
        $_SESSION['tipo'] = "funcionario";
        $_SESSION['usuario'] = $funcionario->getEmail();
        echo($_SESSION['usuario']);
    }
}