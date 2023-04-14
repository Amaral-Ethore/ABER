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
        if ($funcionario->getPrivilegio() == "admin") {
            $_SESSION['mensagem'] = "Logado como Administrador";
            $_SESSION['usuario'] = $funcionario->getEmail();
            $_SESSION['privilegio'] = "admin";
        }
        if ($funcionario->getPrivilegio() == "func") {
            $_SESSION['mensagem'] = "Logado como Funcionario";
            $_SESSION['usuario'] = $funcionario->getEmail();
            $_SESSION['privilegio'] = "func";
        }
    } else {
        $_SESSION['mensagem'] = "Funcionario não encontrado";
        unset($_SESSION['usuario']);
        unset($_SESSION['tipo']);
        unset($_SESSION['privilegio']);
    }
}
