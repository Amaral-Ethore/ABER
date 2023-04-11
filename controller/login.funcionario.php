<?php
require_once('../classes/funcionario.class.php');
require_once('../controller/funcionario.controller.php');
function buscaFuncionario($mail, $senha)
{
    $controller = new FuncionarioController();
    $funcionario = new Funcionario();
    $funcionario = $controller->buscarPorEmail($mail);

    var_dump($funcionario);

    if (isset($funcionario) && $senha == $funcionario->getSenha()) {
        $_SESSION['tipo'] = "funcionario";
        if($funcionario->getPrivilegio() == "admin"){
            $_SESSION['usuario'] = $funcionario->getEmail();
            $_SESSION['privilegio'] = "admin";
        }
        if($funcionario->getPrivilegio() == "func"){
            $_SESSION['usuario'] = $funcionario->getEmail();
            $_SESSION['privilegio'] = "admin";
        }
    } else {
        $_SESSION['usuario'] = "invalido";
        $_SESSION['mensagem'] = "Funcionario Não Encontrado";
    }
}