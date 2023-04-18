<?php
require_once('../classes/cliente.class.php');
require_once('../controller/cliente.controller.php');

function buscaCliente($mail, $senha)
{
    $controller = new ClienteController();
    $cliente = new Cliente();
    $cliente = $controller->buscarPorEmail($mail);
    if (isset($cliente) && $senha == $cliente->getSenha()) {
        $_SESSION['tipo'] = "cliente";
        $_SESSION['mensagem'] = "Logado como Cliente";
        $_SESSION['usuario'] = $cliente->getEmail();
    } else {
        $_SESSION['mensagem'] = "Cliente não Encontrado";
        unset($_SESSION['usuario']);
        unset($_SESSION['tipo']);
        unset($_SESSION['privilegio']);
    }
}
