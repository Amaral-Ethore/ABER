<?php 
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/compra.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/carrinho.controller.php");

$compra = new Carrinho();

if (isset($_GET) && isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval(addslashes(filter_input(INPUT_GET, 'id')));
    $controller = new CarrinhoController();
    $controller-> buscarNome($id);

    
    
}
