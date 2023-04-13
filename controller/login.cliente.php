<?php
require_once('../classes/cliente.class.php');
require_once('../controller/cliente.controller.php');
function buscaCliente($mailclie, $senhaclie)
{
    $controller = new ClienteController();
    $cliente = new Cliente();
    $cliente = $controller->buscarPorEmail($mailclie);
    if ($mailclie && $senhaclie == $cliente->getSenha()) {
        $_SESSION['tipo'] = "cliente";
        $_SESSION['usuario'] = $cliente->getEmail();
        $_SESSION['usuario_id'] = $cliente->getId(); 
        echo ($_SESSION['usuario']);
    }
}
