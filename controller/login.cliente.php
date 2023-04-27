<?php
require_once( (str_replace('\\', '/', dirname(__FILE__, 2))) . '../classes/cliente.class.php');
require_once( (str_replace('\\', '/', dirname(__FILE__, 2))) .'../controller/cliente.controller.php');

function buscaCliente($mail, $senha)
{
    $controller = new ClienteController();
    $cliente = new Cliente();
    $cliente = $controller->buscarPorEmail($mail);
    if (isset($cliente) && $senha == $cliente->getSenha()) {
        $_SESSION['tipo'] = "cliente";
        $_SESSION['mensagem'] = "Logado como Cliente";
        $_SESSION['usuario'] = $cliente->getEmail();
        $_SESSION['id_usuario'] = $cliente->getId();
        $_SESSION['sucesso'] = true; 
    } else {
        $_SESSION['mensagem'] = "Cliente não Encontrado";
        $_SESSION['sucesso'] = false;
        unset($_SESSION['usuario']);
        unset($_SESSION['tipo']);
        unset($_SESSION['privilegio']);
    }
}