<?php
session_start();

/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../acoes/verifica_sessao.php'); */
include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/compra.class.php");
include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/carrinho.controller.php");
include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/compra.controller.php");

$compra= new Compra();

if (isset($_GET) && isset($_GET['key'])) {
    $id = filter_input(INPUT_GET, 'key');
    $controller = new CompraController();
    $compra = $controller->buscarPorId($id);

    $resultado = $controller->removeCompra($id);

    if ($resultado) {
        $_SESSION['mensagem'] = "Removido com sucesso";
        $_SESSION['sucesso'] = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao remover";
        $_SESSION['sucesso'] = false;
    }
}
header('Location:../public/home_compra.php');
