<?php
    require_once('./login.cliente.php');
    require_once('./login.funcionario.php');
    session_start();
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
    
    if(!isset($email) || !isset($senha)){
        $_SESSION['mensagem'] = "Email e Senha do cliente devem ser Preenchidos";
        return false;
    }
    if(isset($email) && isset($senha)){
        $_SESSION['mensagem'] = "Email e Senha Informado com Sucesso";
        if($tipo && $tipo == "cliente"){
            $_SESSION['mensagem'] = "Entrando como cliente.";
            buscaCliente($email, $senha);        
        }
        if($tipo && $tipo == "funcionario"){
            $_SESSION['mensagem'] = "Entrando como funcionario.";
            

        }    
    }
?>