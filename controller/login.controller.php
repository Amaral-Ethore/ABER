<?php 
    require_once('../controller/cliente.controller.php');
    require_once('../classes/cliente.class.php');
    session_start();
    $mailclie = isset($_POST['mailclie']) ? $_POST['mailclie'] : null;
    $mailfunc = isset($_POST['mailfunc']) ? $_POST['mailfunc'] : null;
    $senhaclie = isset($_POST['senhaclie']) ? $_POST['senhaclie'] : null;
    $senhafunc = isset($_POST['senhafunc']) ? $_POST['senhafunc'] : null;

    if(!$mailclie || !$senhaclie){
        $_SESSION['mensagem'] = "Email e Senha devem ser Preenchidos";
        header('Location:../public/index.php');
        return 0;
    }
    $controller = new ClienteController();
    $cliente = new Cliente();
    $cliente = $controller->buscarPorEmail($mailclie);

    if($mailclie && $senhaclie == $cliente->getSenha()){
        $_SESSION['tipo'] = "cliente";
        $_SESSION['usuario'] = $cliente->getEmail();
    }
    
?>