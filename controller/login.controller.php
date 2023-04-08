<?php
    session_start();
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
    
    if(!$email || !$senha){
        $_SESSION['mensagem'] = "Email e Senha do cliente devem ser Preenchidos";
        header('Location:../public/index.php');
        return 0;
    }
    if($mailclie && $senhaclie){
        $_SESSION['mensagem'] = "Cliente Incerido com sucesso.";
        header('Location:./login.cliente.php');
    }
?>