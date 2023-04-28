<?php

require_once('header.php');
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/carrinho.controller.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../DAO/compraDAO.php');
$id_cliente = $_SESSION['id_usuario'];
$compraDAO = new CompraDAO();
$compra = $compraDAO->buscarPorCliente($id_cliente);

$controller = new CarrinhoController();
$carrinho = $controller->buscarTodosPorCompra($compra->getId());
$precoTotal = 0;

require_once('nav.php'); ?>
<div class="container">
    
    <main>
        <h1>Carrinho</h1>
        <?php
        var_dump($compra);
        ?>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>


                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($carrinho as $c) :
                ?>
                    <tr>
                        <td><?= $controller->buscarNome($c->getProduto()); ?></td>
                        <td><?= $c->getQuantprod(); ?></td>
                        <td><?= $c->getPreco(); ?></td>
                        <td>
                            <a class="btn btn-link" href="../acoes/remover.compra.php?key=<?= $c->getId() ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                $precoTotal += $c->getPreco();
                endforeach;
                ?>
            </tbody>
        </table>

        <p> Total: R$<?=str_replace(".", ",", strval($precoTotal))?></p>
        <a href="pag.php?key=<?= $compra->getId() ?>" class="btn_comprar">Comprar</a>


        <?php
        if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == TRUE) {
        ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['mensagem']; ?>
            </div>
        <?php
        }
        if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == false) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['mensagem']; ?>
            </div>
        <?php
        }
        unset($_SESSION['sucesso'], $_SESSION['mensagem']);
        ?>

  
    </main>



</div>
<?php require_once('footer.php'); ?> 
