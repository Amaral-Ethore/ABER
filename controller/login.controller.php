<?php
require_once('./login.cliente.php');
require_once('./login.funcionario.php');

session_start();
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
if (!$email || !$senha){
    $_SESSION['mensagem'] = "Email e Senha do cliente devem ser Preenchidos";
    unset($_SESSION['usuario']);
    header("Location:../public/index.php");
}
if ($email && $senha) {
    if ($_POST && $_POST['tipo'] && $_POST['tipo'] == "cliente") {
        buscaCliente($email, $senha);
        if (isset($_SESSION['usuario']) && isset($_SESSION['sucesso']) && $_SESSION['sucesso']) {
            header("Location:../public/index.php");
        } 
        else {
            header("Location:../public/index.php");
        }
    }
    if ($_POST && $_POST['tipo'] && $_POST['tipo'] == "funcionario") {
        buscaFuncionario($email, $senha);
        if (isset($_SESSION['usuario']) && isset($_SESSION['sucesso']) && $_SESSION['mensagem']) {
            header("Location:../public/gerenciamento.php");
        } 
        else {
            header("Location:../public/index.php");
        }
    }
}
