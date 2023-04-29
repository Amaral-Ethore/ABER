<?php
session_start();
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/compra.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controller/carrinho.controller.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controller/compra.controller.php");

$carrinho = new Carrinho();
$carrinhoController = new CarrinhoController();

// if (isset($_GET) && isset($_GET['key']) && !empty($_GET['key'])) {
//     $id = intval(addslashes(filter_input(INPUT_GET, 'key')));
//     $controller = new CarrinhoController();
//     $controller-> buscarPorId($id);

//     header("Location:../public/carrinho.php");

// }
// else {
//     header("Location:../public/item.php");
// }

if (isset($_POST) && isset($_POST['id_produto'])) {
    $id_produto = filter_input(INPUT_POST, "id_produto");
    $id_cliente = $_SESSION['id_usuario'];

    if ($_SESSION['id_usuario'] == NULL){
        $_SESSION['mensagem'] = "Obrigatório informar Email e Senha";
        $_SESSION['sucesso'] = false;
        header('Location:../public/item.php?key=' . $id_produto);
        die();
    }
    
    $preco_produto = filter_input(INPUT_POST, "preco_produto");

    $compra = new Compra();
    $compra->setCliente($id_cliente);
    // chamar controller e salvar a compra
    $controller = new CompraController();
    $id_compra = $controller->criarCompra($compra);

    if ($id_compra != NULL) {
        $carrinho->setCompra($id_compra);
        $carrinho->setProduto($id_produto);
        $carrinho->setQuantprod(1);
        $carrinho->setPreco($preco_produto);

        $result = $carrinhoController->salvar($carrinho);

        if ($result != NULL && $result > 0) {
            // sucesso
            header("Location:../public/home_compra.php");
        } else {
            // erro
            echo "erro";
        }

    } else {
        echo "erro";
    }
    // pegar ID da compra, povoar classe Carrinho e salvar carrinho no CarrinhoController

} else {
    echo "deu treta";
}
