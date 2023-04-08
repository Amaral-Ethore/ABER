<?php
function buscaCliente($mailclie, $senhaclie){
    $controller = new ClienteController();
    $cliente = new Cliente();
    $cliente = $controller->buscarPorEmail($mailclie);
    var_dump($cliente);
    if($mailclie && $senhaclie == $cliente->getSenha()){
        $_SESSION['tipo'] = "cliente";
        $_SESSION['usuario'] = $cliente->getEmail();
    }
}