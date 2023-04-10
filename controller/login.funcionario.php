<?php
require_once('../classes/funcionario.class.php');
require_once('../controller/funcionario.controller.php');
function buscaFuncionario($mail, $senha){
    $controller = new FuncionarioController();
    $funcionario = new Funcionario();
    $funcionario = $controller->buscarPorEmail($mail);
    if(isset($funcionario)){
        if($senha == $funcionario->getSenha()){
            $_SESSION['tipo'] = "funcionario";
            $_SESSION['usuario'] = $funcionario->getEmail();
            echo($_SESSION['usuario']);
        }
        else{
            $_SESSION['usuario'] = "invalido";
        }
    }
}