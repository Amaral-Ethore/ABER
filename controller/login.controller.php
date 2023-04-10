<?php
// require_once('../classes/cliente.class.php');
// require_once('../controller/cliente.controller.php');
require_once('./login.cliente.php');
session_start();
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
if (!$email || !$senha)/*Unica Maneira que funcionou "!isset não funcionou pois a variavel estava setada com valor null"*/ {
    $_SESSION['mensagem'] = "Email e Senha do cliente devem ser Preenchidos";
    unset($_SESSION['usuario']);
    header("Location:../public/index.php");
}
if ($email && $senha) {
    $_SESSION['mensagem'] = "Email e Senha Informado com Sucesso";
    if ($_POST && $_POST['tipo'] && $_POST['tipo'] == "cliente") {
        $_SESSION['mensagem'] = "Entrando como cliente.";
        
        buscaCliente($email, $senha);
        // $controller = new ClienteController();
        // $cliente = new Cliente();
        // $cliente = $controller->buscarPorEmail($email);

        // var_dump($cliente);
        // if ($email && $senha == $cliente->getSenha()) {
        //     $_SESSION['tipo'] = "cliente";
        //     $_SESSION['usuario'] = $cliente->getEmail();
        // }
    }
    if ($_POST && $_POST['tipo'] && $_POST['tipo'] == "funcionario") {
        $_SESSION['mensagem'] = "Entrando como funcionario.";
    
    }
}