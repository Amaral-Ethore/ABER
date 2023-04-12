<?php
require_once('../classes/cliente.class.php');
require_once('../controller/cliente.controller.php');
function buscaCliente($mailclie, $senhaclie)
{
    $controller = new ClienteController();
    $cliente = new Cliente();
    $cliente = $controller->buscarPorEmail($mailclie);
    var_dump($cliente);
    if (isset($cliente) && $senhaclie == $cliente->getSenha()) {
        $_SESSION['tipo'] = "cliente";
        $_SESSION['usuario'] = $cliente->getEmail();
        $_SESSION['mensagem'] = "sucesso";
    }
    else{
        $_SESSION['usuario'] = "invalido";
        $_SESSION['mensagem'] = "Cliente não encontrado";
    }
}
