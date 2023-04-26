<?php 
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/compra.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controller/carrinho.controller.php");

$compra = new Carrinho();

if (isset($_GET) && isset($_GET['key'])) {
    $id = intval(addslashes(filter_input(INPUT_GET, 'key')));
    $controller = new CarrinhoController();
    $controller-> buscarPorId($id);

    header("Location:../public/index.php");
    
}
else {
    header("Location:../public/item.php");
}
