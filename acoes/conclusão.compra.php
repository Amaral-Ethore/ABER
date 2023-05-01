<?php
session_start();
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/carrinho.controller.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/compra.controller.php');

$carrinho = new Carrinho();

if (isset($_GET) && isset($_GET['key'])) {
    $id_compra = filter_input(INPUT_GET, 'key');
    $controller = new CarrinhoController();
    $carrinho = $controller->buscarTodosPorCompra($id_compra);

    header("Location:../public/conc_compra.php");

    $resultado = $controller->deletarCarrinho($id_compra);
    
  }

  


